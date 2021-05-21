<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uitheme.net/zipto/saved.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 May 2021 05:04:53 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zipto - Payment recharge page</title>
    <link rel="stylesheet" href="/style/css/themify-icons.css">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="/style/css/bootstrap.css">
    <link rel="stylesheet" href="/style/css/style.css">
    <script src="https://cdn.jsdelivr.net/alasql/0.3/alasql.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.12/xlsx.core.min.js"></script>
</head>

<body class="color-theme-blue">
    <div class="preloader"></div>
    <div class="main-wrapper">
        <div class="header-wrapper shadow-xs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 navbar">
                        <a href="index.html" class="logo">
                            <h1 class="fredoka-font ls-3 fw-700 text-current display1-size">Zipto</h1>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav nav-menu float-none text-center">

                                <li class="nav-item"><a class="nav-link" href="/">Trang chủ</a></li>
                                <li class="nav-item"><a class="nav-link" href="/">Về chúng tôi</a></li>
                                <li class="nav-item"><a class="nav-link" href="/">Liên hệ</a></li>
                                <li class="nav-item"><a class="nav-link" href="/index.php/Admin">Quản trị</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-wrapper bg-greylight">
            <div class="row" style="margin-right: 0px;margin-left: 0px;"></div>
            <div class="col-lg-12">
                <div class="hide row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <img src="/style/images/logo.png" alt="logo">
                        <h2 class="title-text2 text-white mt-4"><b>Beautiful designs to get you started</b></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="dashboard-nav bg-white rounded-lg shadow-xs">
                            <a href="#" class="dash-menu d-none d-block-md"><i class="ti-package font-sm mr-2"></i> Menu <i class="ti-angle-down font-xsss float-right "></i></a>
                            <ul class="dash-menu-ul">
                                <li class="d-block rounded-lg"><a href="#"><i class="ti-package font-sm"></i><span style="font-size: large"> Chọn loại dịch vụ<br><span></span></span></a></li>
                                <?php foreach ($categories as $i => $ct) : ?>
                                    <li id="cate_<?= $ct->id ?>" class="d-block rounded-lg active"><a href="#"><i class="ti-pie-chart font-sm "></i><span><?= $ct->name ?></span></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="dashboard-tab cart-wrapper p-4 bg-white rounded-lg shadow-xs">
                            <div class="clearfix"></div>
                            <div class="table-content table-responsive">
                                <table class="table text-center">
                                    <thead class="bg-greyblue rounded-lg">
                                        <tr>
                                            <th width="40%" class="border-0 p-3 text-left">Sản phẩm</th>
                                            <th width="20%" class="border-0 p-3 text-center">Đơn giá</th>
                                            <th width="10%" class="border-0 p-3 text-left">Phân khúc</th>
                                            <th width="10%" class="border-0 p-3 text-left">Số lượng</th>
                                            <th width="20%" class="border-0 p-3 text-center">Tổng giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($products as $i => $pd) : ?>
                                            <tr class="p_cate_<?= $pd->cid ?>">
                                                <td class="product-headline text-left wide-column ">
                                                    <h3>
                                                        <p style='font-size:larger' class="text-grey-900 fw-600 "><?= $pd->pname ?></p>
                                                    </h3>
                                                </td>
                                                <td class="product-p ">
                                                    <span class="product-price-wrapper ">
                                                        <span tag="s_product<?= $pd->id ?>" class="money text-grey-500 fw-500 "><?= $pd->price1 ?></span>
                                                    </span>
                                                </td>

                                                <td class="product-p ">
                                                    <select class="s_product<?= $pd->id ?>" style="padding: 11px;border: 1px solid #dedede;" class="product-quantity">
                                                        <option value="<?= $pd->price1 ?>" selected> Bình dân</option>
                                                        <?php if ($pd->price2 != "0") : ?><option value="<?= $pd->price2 ?>"> Sơ cấp</option><?php endif; ?>
                                                        <?php if ($pd->price3 != "0") : ?><option value="<?= $pd->price3 ?>"> Trung cấp</option><?php endif; ?>
                                                        <?php if ($pd->price4 != "0") : ?><option value="<?= $pd->price4 ?>"> Cao cấp</option><?php endif; ?>
                                                    </select>
                                                </td>
                                                <td class="product-quantity ">
                                                    <div class="quantity ">
                                                        <input tag="s_product<?= $pd->id ?>" type="number" step="1" class="quantity-input " name="qty " id="qty-1" value="0" min="0">
                                                    </div>
                                                </td>
                                                <td class="product-total-price ">
                                                    <span class="product-price-wrapper ">
                                                        <span tag="s_product<?= $pd->id ?>"
                                                         class="money fmont"><strong>đ 0</strong></span>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="rounded-xxl bg-greylight main-color p-3">
                            <div class="col-lg-12 pl-0">
                                <!-- <h4 class="mb-4 font-xs fw-700 mont-font mt-0">Add Card </h4> -->
                            </div>
                            <div class="col-lg-12">
                                <div class="card border-0 shadow-none mb-4 mt-3">
                                    <div class="card-body d-block text-left p-0">
                                        <div class="item w-100 h150 bg-white rounded-xxl overflow-hidden text-left shadow-md pl-3 pt-2 align-items-end flex-column d-flex">
                                            <div class="card border-0 shadow-none p-0 text-left w-100">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img src="/style/images/b-9.png" alt="icon" class="w40 float-left d-inline-block">
                                                    </div>
                                                    <div class="col-3">
                                                        <img src="/style/images/b-10.png" alt="icon" class="w40 float-left d-inline-block">
                                                    </div>
                                                    <div class="col-3">
                                                        <img src="/style/images/visa.png" alt="icon" class="w40 float-left d-inline-block">
                                                    </div>
                                                    <div class="col-3 text-right  pr-4">
                                                        <img src="/style/images/chip.png" alt="icon" class="w30 float-right d-inline-block mt-2 mr-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 shadow-none p-0 text-left w-100 mt-auto">
                                                <h4  class="text-grey-900 font-sm fw-900 lato-font mb-3">đ <span id = "total_price" >0</span><span class="d-block fw-500 text-grey-500 font-xssss mt-1" style="font-size: 15px !important;">Tổng chi phí</span></h4>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <form>
                                    <div class="form-group mb-1">
                                        <label class="text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Họ và tên</label>
                                        <div class="form-group icon-tab">
                                            <input type="email" name="fullname" class="bg-white border-0 rounded-lg form-control pl-4 bg-color-none border-bottom text-grey-900" placeholder="Họ và tên">
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label class="text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Email</label>
                                        <div class="form-group icon-tab">
                                            <input type="email" name="email" class="bg-white border-0 rounded-lg form-control pl-4 bg-color-none border-bottom text-grey-900" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label class="text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Số điện thoại</label>
                                        <div class="form-group icon-tab">
                                            <input type="text" name="phone" class="bg-white border-0 rounded-lg form-control pl-4 bg-color-none border-bottom text-grey-900" placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="#" style="padding: 0.7rem !important;color: white !important;" class="rounded-lg bg-current mb-2 p-3 w-100 fw-600 fw-700 text-center font-xssss mont-font text-uppercase ls-3 text-white d-block">Nhận tư vấn</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" id="export_pdf" style="background-color: #c94b4b !important; padding: 0.7rem !important; color: white !important;" class="rounded-lg bg-current mb-2 p-3 w-100 fw-600 fw-700 text-center font-xssss mont-font text-uppercase ls-3 text-white d-block">Xuất excel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- footer wrapper -->
    <div class="footer-wrapper mt-0 bg-dark ">
        <div class="container ">
            <div class="row ">

                <div class="col-lg-12 ">
                    <div class="row ">
                        <div class="col-md-12 col-lg-4 col-sm-9 col-xs-12 md-mb25 ">
                            <a href="/" class="logo "><img src="/style/images/logo-white.png " alt="logo "></a>
                            <p class="w-100 mt-lg-5 mt-4 ">Địa chỉ, <br>NY 10010 1-877-932-7111 <br> tieccuoi@mail.com</p>
                            <ul class="list-inline ">
                                <li class="list-inline-item mr-3 "><a href="# "><i class="ti-facebook "></i></a></li>
                                <li class="list-inline-item mr-3 "><a href="# "><i class="ti-twitter-alt "></i></a></li>
                                <li class="list-inline-item mr-3 "><a href="# "><i class="ti-linkedin "></i></a></li>
                                <li class="list-inline-item "><a href="# "><i class="ti-instagram "></i></a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-lg-2 col-sm-3 col-xs-6 md-mb25 ">
                            <h5>Dịch vụ</h5>
                            <ul>
                                <li><a href="# ">Tiệc cưới</a></li>
                                <li><a href="# ">Đám hỏi</a></li>
                                <li><a href="# ">Đặt bàn</a></li>
                                <li><a href="# ">Trang điểm</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-lg-2 col-sm-4 col-xs-6 ">
                            <h5>Kênh</h5>
                            <ul>
                                <li><a href="# ">Facebook</a></li>
                                <li><a href="# ">Instagram</a></li>
                                <li><a href="# ">Youtube</a></li>
                                <li><a href="# ">Zalo</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-lg-2 col-sm-4 col-xs-6 ">
                            <h5>About</h5>
                            <ul>
                                <li><a href="# ">FAQ</a></li>
                                <li><a href="# ">Điều khoản</a></li>
                                <li><a href="# ">Pháp lý</a></li>
                                <li><a href="# ">Phản hooif</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-lg-2 col-sm-4 col-xs-6 ">
                            <h5 class="mb-3 ">Văn phòng</h5>
                            <p style="width: 100%; ">Địa chỉ 1 <br>123-485-65-66</p>
                            <p style="width: 100%; ">Địa chỉ 2 <br>123-485-65-66</p>
                        </div>
                    </div>
                    <div class="middle-footer mt-5 pt-4 "></div>
                </div>
                <div class="col-sm-12 lower-footer pt-0 "></div>
                <div class="col-sm-6 col-xs-12 ">
                    <p class="copyright-text ">© 2021 copyright. All rights reserved.</p>
                </div>
                <div class="col-sm-6 col-xs-12 text-right ">
                    <p class="copyright-text float-right ">Design by <a href="# " class=" ">uitheme</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer wrapper -->

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js "></script>
    <script src="/style/js/plugin.js "></script>
    <script src="/style/js/scripts.js "></script>
    <script src="/style/js/main.js "></script>
    <script>
        $(".dashboard-tab ").height($('.dashboard-nav').height() - 18);
        $(".dashboard-tab ").niceScroll({
            cursorcolor: "#999 ", // change cursor color in hex
        });
    </script>

</body>


<!-- Mirrored from uitheme.net/zipto/saved.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 May 2021 05:04:53 GMT -->

</html>