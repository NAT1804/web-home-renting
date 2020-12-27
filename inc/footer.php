<!-- footer -->
<footer class="py-5">
        <div class="container py-xl-4 py-lg-3">
            <div class="row footer-grids">
                <div class="col-lg-2 col-6 footer-grid">
                    <h3 class="mb-sm-4 mb-3 pb-lg-3">Home</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="index.html">Index</a>
                        </li>
                        <li>
                            <a href="#about">About Us</a>
                        </li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li>
                            <a href="#gallery">Gallery</a>
                        </li>
                        <li>
                            <a href="#contact">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 footer-grid">
                    <h3 class="mb-sm-4 mb-3 pb-lg-3"> Company</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#find">Find a Property</a>
                        </li>
                        <li>
                            <a href="#blog">Our Blog</a>
                        </li>
                        <li>
                            <a href="#places">Popular Places</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 footer-grid footer-contact mt-lg-0 mt-4">
                    <h3 class="mb-sm-4 mb-3 pb-lg-3"> Contact Us</h3>
                    <ul class="list-unstyled">
                        <li>
                            +01(24) 8543 8088
                        </li>
                        <li>
                            <a href="mailto:info@example.com">info@example.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 footer-grid text-lg-right">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#facts">Statistical Facts</a>
                        </li>
                        <li>
                            <a href="#find">Find a Property</a>
                        </li>
                        <li>
                            <a href="#testi">Testimonials</a>
                        </li>
                        <li>
                            <a href="#apps">Apps</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 footer-grid mt-lg-0 mt-4">
                    <div class="footer-logo">
                        <h2 class="text-lg-center text-center">
                            <a class="logo text-wh font-weight-bold" href="index.html"><span
                                    class="text-bl">Easy</span>Accomod</a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  
    <a href="#home" class="move-top text-center">
        <span class="fa fa-angle-double-up" aria-hidden="true"></span>
    </a>
    <!-- //move top icon -->
    <script src="public/js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#city').on('change', function() {
                var cityId = $(this).val();
                if(cityId) {
                    $.ajax({
                        type:'POST',
                        url:'classes/districtController.php',
                        data:'cityId='+cityId,
                        success:function(html) {
                            $('#district').html(html);
                        }
                    });
                } else {
                    $('#district').html('<option value="">Chọn quận/huyện</option>');
                }
            });
            $('#city').on('click', function() {
                var cityId = $(this).val();
                if(cityId) {
                    $.ajax({
                        type:'POST',
                        url:'classes/districtController.php',
                        data:'cityId='+cityId,
                        success:function(html) {
                            $('#district').html(html);
                        }
                    });
                } else {
                    $('#district').html('<option value="">Chọn quận/huyện</option>');
                }
            });
            $('#elecwater').on('change', function(){
                var elecwaterId = $(this).val();
                if (elecwaterId == 0) {
                    $('#elec').val('1864');
                    $('#water').val('9442');
                    $('#elec').prop('readonly', true);
                    $('#water').prop('readonly', true);
                } else if (elecwaterId == 1) {
                    $('#elec').val('');
                    $('#water').val('');
                    $('#elec').prop('readonly', false);
                    $('#water').prop('readonly', false);
                } else {
                    $('#elec').val('');
                    $('#water').val('');
                    $('#elec').prop('readonly', true);
                    $('#water').prop('readonly', true);
                }
            });
            $('#time').blur(function() {
                var t = parseFloat($('#time').val());
                if (t < 7) {
                    $('#time').val('');
                    //$('#price').val('Thời gian tối thiểu là 7 ngày');
                } else {
                    var pr =t * 10000;
                    $('#price').val(pr);
                }
            });
        });
    </script>
    <link href="public/css/flexslider.css" rel='stylesheet' type='text/css' />
    <script defer src="public/js/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $(function(){
            SyntaxHighlighter.all();
        });
        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
