$(document).ready(function () {
    $('.box .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

    $('.producer .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

    $('.news .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 3,
                nav: true,
                loop: false
            }
        }
    });
    $('.brand .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: false
            }
        }
    });
    const next = document.querySelectorAll("span");
    next.forEach(i => {
        if (i.getAttribute("aria-label") == "Next" || i.getAttribute("aria-label") == "Previous") {
            i.innerHTML = "";
        }
    });

    $(".info").mouseover(function () {
        $(".user").stop().slideDown(250);

        // return false;
    })
    $(".info").mouseout(function () {
        $(".user").stop().slideUp(250);

        // return false;
    })

    $("li.mainMenu").mouseover(function () {
        $(".subMenu").stop().slideDown(200);
    })
    $("li.mainMenu").mouseout(function () {
        $(".subMenu").stop().slideUp(200);
    })

    let style = document.querySelectorAll(".style-product div");
    style.forEach(a => {
        a.addEventListener("click", function () {
            let b = document.querySelectorAll(".style-product div");
            b.forEach(element => {
                element.style.color = "black";
            });
            this.style.color = "#DDC35F";
            title = this.innerHTML;
            let sanpham = document.querySelectorAll(".product");
            if (title == "Sản phẩm giảm giá") {
                sanpham.forEach(element => {
                    element.style.display = "none"
                });
                document.querySelector(".popular-product").style.display = "flex"
            } else if (title == "Sản phẩm bán chạy") {
                sanpham.forEach(element => {
                    element.style.display = "none"
                });
                document.querySelector(".discount-product").style.display = "flex"
            } else if (title == "Sản phẩm mới") {
                sanpham.forEach(element => {
                    element.style.display = "none"
                });
                document.querySelector(".new-product").style.display = "flex"
            }
        })
    });

    // Dữ liệu size

    let checkSize = document.querySelector(".size-data");
    if (checkSize != null) {
        let checkSize = document.querySelector(".size-data").parentElement.querySelector("label");
        console.log(2);
        // console.log(checkSize);
        checkSize.style.background = "#DDC35F";
        checkSize.style.color = "white"


        $(".choose").click(function () {
            let a = this.parentElement.getElementsByTagName("input");
            a[0].hasAttributes("check");
            let b = document.querySelectorAll(".choose");
            b.forEach(element => {
                element.style.background = "none";
                element.style.color = "black";
            });

            $(this).css("background-color", "#DDC35F");
            $(this).css("color", "white")
        })
    }
    //  end data-size

    let checkColor = document.querySelector(".color-data");
    if (checkColor != null) {
        let checkColor = document.querySelector(".color-data").parentElement;
        console.log(1);
        checkColor.querySelector("label").style.background = "#848383";
        checkColor.querySelector("i").style.color = "white";
        $(".choose-color").click(function () {
            let a = this.parentElement.getElementsByTagName("input");
            a[0].hasAttributes("check");
            let b = document.querySelectorAll(".choose-color");
            b.forEach(element => {
                element.style.background = "#ababab";
                element.querySelector("i").style.color = "transparent";
            });

            $(this).css("background-color", "#848383");
            this.parentElement.querySelector("i").style.color = "white";
        });
    }
    $(".sub-img").click(function () {
        let link_img = this.querySelector("img").getAttribute("src");
        $(".main-img img").attr("src", link_img)
        return false;
    })

    $(".math").click(function () {
        let value = this.querySelector("i");
        let number = this.parentElement.querySelector("input").value;
        if (value.getAttribute("value") == "plus") {
            number = +number + 1;
            $(".sl").val(number);
        } else {
            if (number > 1) {
                number = +number - 1;
                $(".sl").val(number);
            } else {
                number = 1;
                $(".sl").val(number);
            }
        }
    })

    $(".info-detail").click(function () {
        let accept = document.querySelectorAll(".info-detail")
        accept.forEach(element => {
            element.removeAttribute("id", "choosed");
        });

        if (this.innerHTML == "Mô tả") {
            $(".box-comment").css("display", "none");

            $(this).attr("id", "choosed");
            $(".table-infomation").css("display", "block");
        } else {
            $(".table-infomation").css("display", "none");
            $(this).attr("id", "choosed");
            $(".box-comment").css("display", "block");
        }

    })

    // Click vào thẻ li ở bên trang sản phẩm và nằm ở menu bên trái có mũi tên đi xuống
    $(".down-pg-product").click(function () {
        $(".sub-menu-left").stop().toggle(200);
    })


    //Kiểm tra đăng ký / đăng nhập

    $("#dangky").submit(function () {
        let taikhoan = document.querySelector("#tk");
        let email = document.querySelector("#email");
        let matkhau = document.querySelector("#mk");
        let loiTk = document.querySelector(".errorDk")
        console.log(taikhoan);
        if (taikhoan.value == "" || email.value == "" || matkhau.value == "") {
            loiTk.innerHTML = "Vui lòng nhập đủ thông tin !!"
            loiTk.style.color = "red";
            return false;
        }

    });
    $("#dangnhap").submit(function () {
        console.log($("#dangnhap"));
        let email = document.querySelector("#emaildangnhap");
        let matkhau = document.querySelector("#mkdangnhap");
        let loiTk = document.querySelector(".errorDn")
        // console.log(taikhoan);
        if (email.value == "" || matkhau.value == "") {
            loiTk.innerHTML = "Vui lòng nhập đủ thông tin !!"
            loiTk.style.color = "red";
            return false;
        }

    })

    // let price = document.querySelectorAll(".price_pro");
    // console.log(price);
    //tính tổng các sản phẩm trong giỏ hàng
    function total_sp() {
        let price = document.querySelectorAll(".price_pro");
        // console.log(price);
        let sl = document.querySelectorAll(".sl");
        if (price != null && sl != null) {
            let sl = document.querySelectorAll(".sl");
            // console.log(sl);
            let total = 0;
            // let tongsp=price[0].getAttribute("value");
            for (let i = 0; i < price.length; i++) {
                let tongsp = price[i].getAttribute("value");
                // console.log(tongsp);
                let sl1 = +(sl[i].value);
                console.log(sl1);
                // console.log(typeof sl1);
                let t = +tongsp * sl1;
                console.log(t);
                total += t;
                console.log(total);
            }
            const VND = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
            });
            let tong = VND.format(total)
            // console.log(tongsp);
            let a = document.querySelector(".total_all");

            if (a != null) {
                a.querySelector("span").innerHTML = tong;
                document.getElementById('input-total').value = total;

            }

            // console.log(document.querySelector(".total_all"));
        }
    }

    function removeAttr(a) {
        a.parentElement.querySelector("#tdsl").removeAttribute("disabled");
    }

    total_sp();
    let sl = document.querySelectorAll(".sl");
    if (sl != null) {
        $(".sl").change(function () {
            total_sp();
            removeAttr(this)
            // console.log(this);
        });
    }

    // console.log($("#updateUser"));
    if ($("#updateUser") != null) {
        $("#updateUser").submit(function () {
            let ten = document.querySelector("#username").value;
            let tk = document.querySelector("#tk").value;
            let mk = document.querySelector("#mk").value;
            let email = document.querySelector("#email").value;
            let address = document.querySelector("#address").value;
            let phone = document.querySelector("#phone").value;
            let error = "";
            // console.log(ten);
            // 
            if (ten == "" || tk == "" || mk == "" || email == "" || address == "" || phone == "") {
                error = "Bạn vui lòng nhập đủ thông tin";
                document.querySelector("#error").innerHTML = error;
                return false;
            }

        })
    }

    let showPass = $(".eye");
    if (showPass != null) {
        $(".eye").click(function () {
            let pass = $("#mk");
            if (pass[0].getAttribute("type") == "password") {
                pass[0].setAttribute("type", "text");
                this.querySelector("i").setAttribute("class", "fa-solid fa-eye");
            } else {
                pass[0].setAttribute("type", "password");
                this.querySelector("i").setAttribute("class", "fa-regular fa-eye");
            }
            console.log();;

        })
    };
    let showeye = $(".eyes");
    if (showPass != null) {
        $(".eyes").click(function () {
            let pass = $("#mkdangnhap");
            if (pass[0].getAttribute("type") == "password") {
                pass[0].setAttribute("type", "text");
                this.querySelector("i").setAttribute("class", "fa-solid fa-eye");
            } else {
                pass[0].setAttribute("type", "password");
                this.querySelector("i").setAttribute("class", "fa-regular fa-eye");
            }
            console.log();;

        })
    }

    let updatePass = $("#updatePass");
    // console.log(updatePass);
    if (updatePass != null) {
        $("#updatePass").submit(() => {
            let oldPass = document.querySelector("#old-pass").value;
            let newPass = document.querySelector("#newpass").value;
            let repeatPass = document.querySelector("#repeatnewpass").value;
            if (oldPass == "" || newPass == "" || repeatPass == "") {
                error = "Bạn vui lòng nhập đủ thông tin";
                document.querySelector("#error").innerHTML = error;
                return false;
            }
            if (newPass != repeatPass) {
                error = "Mật khẩu nhập lại không trùng với mật khẩu bạn đặt";
                document.querySelector("#error").innerHTML = error;
                return false;
            }
        })
    }

    let filter = document.querySelector("#filter_price");

    if (filter != null) {
        let filter = document.querySelector("#filter_price");
        let show_price = document.querySelector("#show_price span");
        show_price.textContent = filter.value;
        filter.oninput = function () {
            // console.log(this.value);
            show_price.innerHTML = Number(this.value).toLocaleString();

        };

    };


});