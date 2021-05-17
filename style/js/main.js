$(".category ").click(function() {
    console.log("test ")
    $category = $(this);
    $content = $category.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(300, function() {
        console.log("tes ");
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
    prod_block.toggleClass("hide")
});