<section class="newsletter_area">
    <div class="container">
        <div class="row newsletter_inner">
            <div class="col-lg-6">
                <div class="news_left_text">
                    <h4>Tham gia danh sách để nhận bản tin của chúng tôi để nhận được tất cả các ưu đãi, chiết khấu mới nhất và các lợi ích khác</h4>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="newsletter_form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter your email address">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Subscribe Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Newsletter Area =================-->

<!--================Footer Area =================-->
<footer class="footer_area">
    <div class="footer_widgets">
        <div class="container">
            <div class="row footer_wd_inner">
                <div class="col-lg-3 col-6">
                    <aside class="f_widget f_about_widget">
                        <img src="../img/footer-logo.png" alt="">
                        <p>Trong những năm trở lại đây, bánh Pháp và Mỹ được xếp vào loại những loại tráng miệng ngon nhất thế giới, các loại bánh ngon đến từ hai đất nước này đang ngày một chiếm gần tình cảm và được giới trẻ Việt Nam ưa chuộng.</p>
                        <ul class="nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-3 col-6">
                    <aside class="f_widget f_link_widget">
                        <div class="f_title">
                            <h3>Thời Gian</h3>
                        </div>
                        <ul class="list_style">
                            <li><a href="#">Mon. : Fri.: 8 am - 8 pm</a></li>
                            <li><a href="#">Sat. : 9am - 4pm</a></li>
                            <li><a href="#">Sun. : Closed</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-3 col-6">
                    <aside class="f_widget f_contact_widget">
                        <div class="f_title">
                            <h3>Liên Hệ</h3>
                        </div>
                        <h4>(1800) 574 9687</h4>
                        <p>HUTECH <br />475A Điện Biên Phủ, Phường 25, Bình Thạnh, Thành phố Hồ Chí Minh</p>
                        <h5>cakebakery@contact.co.in</h5>
                    </aside>
                </div>
                <div class="col-lg-3 col-6">
                    <aside class="f_widget f_link_widget">
                        <div class="f_title">
                            <h3>Đường Dẫn Nhanh</h3>
                        </div>
                        <div class="fb-page"
                             data-href="https://www.facebook.com/C%E1%BB%ADa-h%C3%A0ng-Cake-Bakery-102494562277873"
                             data-width="480"
                             data-hide-cover="false"
                             data-show-facepile="false"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_copyright">
        <div class="container">
            <div class="copyright_inner">
                <div class="float-left">
                    <h5><a target="_blank" href="https://www.templatespoint.net"></a></h5>
                </div>
                <div class="float-right">
                    <a href="#">Mua Ngay</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--================End Footer Area =================-->


<!--================Search Box Area =================-->
<div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
    <div class="search_box_inner">
        <h3>Search</h3>
        <div class="input-group">
            <form action="../PHPfile/Search.php" method="get">
                <input type="text" class="form-control" name="search" placeholder="Search for..." style="color: white">
                <span class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="icon icon-Search"></i></button>
                </span>
            </form>
        </div>
    </div>
</div>
<!--================Share FB =================-->
<script>
    $(document).ready(function() {
        $('.share').click(function(e) {
            e.preventDefault();
            window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0,         directories=0, scrollbars=0');
            return false;
        });
    });
</script>
<!--================Share FB =================-->

<script>
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".file-upload").on('change', function(){
            readURL(this);
        });
    });
</script>
<!-- Include the PayPal JavaScript SDK; replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=Afk_aUJeDz5f4YlIBfym3FNGmaKjdmx3xZFJH7PlFOXChR8Rk9TdRf_2HqIK1Kt1dZUHHtJzkT1VxhI3&currency=USD"></script>
<script>
    var money = document.getElementById('vnd_to_usd').value;
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: money // Can reference variables or functions. Example: value: document.getElementById('...').value
                    }
                }]
            });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];

                // When ready to go live, remove the alert and show a success message within this page. For example:
                var element = document.getElementById('paypal-button-container');
                element.innerHTML = '';
                element.innerHTML = '<h4>Thank you for your payment!</h4>';
                document.getElementById("check").click();
            });
        }
    }).render('#paypal-button-container');
</script>


<script src="../js/webuser.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- Rev slider js -->
<script src="../vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="../vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="../vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="../vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="../vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="../vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="../vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<!-- Extra plugin js -->
<script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="../vendors/magnifc-popup/jquery.magnific-popup.min.js"></script>
<script src="../vendors/datetime-picker/js/moment.min.js"></script>
<script src="../vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
<script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="../vendors/jquery-ui/jquery-ui.min.js"></script>
<script src="../vendors/lightbox/simpleLightbox.min.js"></script>

<script src="../js/theme.js"></script>
<script src="../js/district.js"></script>


<script>
    !function(s,u,b,i,z){var o,t,r,y;s[i]||(s._sbzaccid=z,s[i]=function(){s[i].q.push(arguments)},s[i].q=[],s[i]("setAccount",z),r=["widget.subiz.net","storage.googleapis"+(t=".com"),"app.sbz.workers.dev",i+"a"+(o=function(k,t){var n=t<=6?5:o(k,t-1)+o(k,t-3);return k!==t?n:n.toString(32)})(20,20)+t,i+"b"+o(30,30)+t,i+"c"+o(40,40)+t],(y=function(k){var t,n;s._subiz_init_2094850928430||r[k]&&(t=u.createElement(b),n=u.getElementsByTagName(b)[0],t.async=1,
        t.src="https://"+r[k]+"/sbz/app.js?accid="+z,n.parentNode.insertBefore(t,n),
        setTimeout(y,2e3,k+1))})(0))}
    (window,document,"script","subiz","acremzvewioedcvyphab");
</script>
</body>

</html>
