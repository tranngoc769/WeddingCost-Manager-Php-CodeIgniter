const formatter = new Intl.NumberFormat("vi-VN", {
    style: "currency",
    currency: "VND",
});
$(document).ready(function() {

    window.saveCustomer = function saveCustomer(data) {
        var sheet_1_data = []
        for (let index = 0; index < data.length; index++) {
            let element = data[index];
            sheet_1_data.push({ 'Tên': element.name, 'Email': element.email, 'Phone': element.phone, 'Date': element.dateadd });
        }
        var opts = [{ sheetid: 'KháchHàng', header: true }];
        var result = alasql('SELECT * INTO XLSX("KháchHàng.xlsx",?) FROM ?', [opts, [sheet_1_data]]);
    }
    window.saveFile = function saveFile() {
        // 
        var sheet_1_data = []
        var trs = $("tr");
        var total = 0;
        for (let index = 1; index < trs.length; index++) {
            let element = trs[index];
            let cells = element.cells;
            let name = cells[0].getElementsByTagName("p")[0].innerText;
            var stock_price = cells[1].getElementsByTagName("span")[1].innerText;
            var select_b = cells[2].getElementsByTagName("select")[0]
            let type = select_b[select_b["selectedIndex"]].innerText;
            let amount = cells[3].getElementsByTagName("input")[0].value;
            let sum = cells[4].getElementsByTagName("strong")[0].innerText
            let data = { 'Mục chi': name, 'Đơn giá': stock_price, 'Phân khúc': type, 'Số lượng': amount, 'Tổng': sum }
            sheet_1_data.push(data);
            total += amount * 1 * stock_price.replace(/[^0-9\.]/g, "").replaceAll(".", "");;
        }
        sheet_1_data.push({ 'Mục chi': 'Tổng', 'Đơn giá': formatter.format(total) });
        var opts = [{ sheetid: 'Bảng giá', header: true }];
        var result = alasql('SELECT * INTO XLSX("KinhPhí.xlsx",?) FROM ?', [opts, [sheet_1_data]]);
    }
    let simulator = () => {
        let total = 0;
        var all = $("span[class='money fmont']")
        for (var i = 0; i < all.length; i++) {
            let product = all[i];
            let price = product.innerText.replace(/[^0-9\.]/g, "").replaceAll(".", "");
            total += price * 1;
        }
        $("#total_price").text(formatter.format(total));
    }
    $(".category ").click(function() {
        console.log("test ")
        $category = $(this);
        $content = $category.next();
        //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
        $content.slideToggle(300, function() {
            console.log("tes ");
        });

    });
    $("#export_pdf").on('click', function() {
        var check = true;
        if ($("#hoten").val() == "" || $("#email").val() == "" || $("#sdt").val() == "") {
            check = false;
        }
        if (check == false) {
            swal("Không thành công!", "Vui lòng nhập đầy đủ: Họ tên, email, số điện thoại để nhận excel!", "error");
            return;
        }
        $("#tuvan").click();
        saveFile();
    });

    $("#exportEmail").on('click', function(e) {
        e.preventDefault();
        var url = "/index.php/admin/download";
        var settings = {
            "url": url
        };
        $.ajax(settings)
            .fail((result, status, error) => {
                console.log(result);
                swal("Không thành công!", "result", "error");
            }).done((result, status, error) => {
                let data = JSON.parse(result);
                saveCustomer(data);
            });
    });
    $("#tuvan").on('click', function(e) {
        e.preventDefault();
        let hoten = $("#hoten").val();
        let email = $("#email").val();
        let sdt = $("#sdt").val();
        if (hoten == "" || sdt == "") {
            swal("Không thành công!", "Họ và tên, Số điện thoại không được để trống", "error");
            return;
        }
        var formData = new FormData();
        formData.append('hoten', hoten);
        formData.append('email', email);
        formData.append('sdt', sdt);
        var url = "index.php/Account/tuvan";
        var settings = {
            "url": url,
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": formData
        };
        $.ajax(settings)
            .fail((result, status, error) => {
                swal("Không thành công!", "Nhận thông tin không thành công!", "error");
            }).done((result, status, error) => {
                let data = JSON.parse(result);
                swal("Thành công!", "Nhận thông tin thành công!", "success");
            });
    });
    // $(document).on('click', '#cate_1', function(e) {
    $("li[id^='cate_']").click(function(e) {
        $(this).toggleClass("active")
        e.preventDefault();
        let cate_id = this.id;
        let p_cate_id = "p_" + cate_id;
        let prod_block = $("." + p_cate_id);
        //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
        prod_block.toggleClass("hide");
        simulator();
    });
    $(document).on('change', "select[class^='s_product']", function() {
        let s_product = $(this);
        let p_id = s_product.attr("class");
        let price = s_product.val();
        $(`span[tag='${p_id}']`)[0].innerText = formatter.format(price);
        // 
        let amount = $(`input[tag='${p_id}']`).val();
        let total = price * amount;
        $(`span[tag='${p_id}'][class='money fmont']`)[0].innerHTML = `<strong>${formatter.format(total)}</strong>`;
        simulator();
    })
    $(document).on('change', "input[tag^='s_product']", function() {
        let s_product = $(this);
        let p_id = s_product.attr('tag');
        let amount = s_product.val();
        let price = $(`span[tag='${p_id}']`)[0].innerText.replace(/[^0-9\.]/g, "").replaceAll(".", "");
        let total = price * amount;
        $(`span[tag='${p_id}'][class='money fmont']`)[0].innerHTML = `<strong>${formatter.format(total)}</strong>`;
        simulator();
    })
    $("select[class^='s_product']").trigger("change");

});