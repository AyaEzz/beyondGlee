@extends('layouts.app')

@section('content')
<section id="page-title" class="page-title-parallax page-title-dark" style="padding: 250px 0px; background-image: url(&quot;images/about/me-parallax.jpg&quot;); background-size: cover; background-position: 50% -248.4px;" data-stellar-background-ratio="0.4">

    <div class="container clearfix">
        <h1>About Us</h1>
        <span>Everything you need to know about our Company</span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">About Us</li>
        </ol>
    </div>

</section>
<section id="content" style="margin-bottom: 0px;">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="row clearfix">

                    <div class="col-md-6">

                        <h3>Objective</h3>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa repellendus adipisci laborum placeat delectus labore cupiditate deserunt minus numquam consequatur esse, hic at earum illo animi eaque et, dolorem quo qui eos? Quam rerum possimus maxime veniam aut ratione eveniet aliquid cumque aspernatur ipsum libero quaerat, nam. Ad, sunt, error!</p>

                    </div>

                    <div class="col-md-6">

                        <h3>Future Endaevours</h3>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa repellendus adipisci laborum placeat delectus labore cupiditate deserunt minus numquam consequatur esse, hic at earum illo animi eaque et, dolorem quo qui eos? Quam rerum possimus maxime veniam aut ratione eveniet aliquid cumque aspernatur ipsum libero quaerat, nam. Ad, sunt, error!</p>

                    </div>

                </div>

            </div>

            <div class="section parallax dark bottommargin-lg" style="background-image: url(&quot;images/services/home-testi-bg.jpg&quot;); padding: 100px 0px; background-position: 50% 80.4px;" data-stellar-background-ratio="0.3">

                <div class="container clearfix">

                    <div class="col_one_fourth nobottommargin center bounceIn animated" data-animate="bounceIn">
                        <i class="i-plain i-large divcenter nobottommargin icon-time"></i>
                        <div class="counter counter-lined"><span data-from="10" data-to="45" data-refresh-interval="50" data-speed="4000" data-comma="true">45</span>+</div>
                        <h5>Hours per Week</h5>
                    </div>

                    <div class="col_one_fourth nobottommargin center bounceIn animated" data-animate="bounceIn" data-delay="100">
                        <i class="i-plain i-large divcenter nobottommargin icon-code"></i>
                        <div class="counter counter-lined"><span data-from="100" data-to="1524" data-refresh-interval="50" data-speed="2500" data-comma="true">1,524</span></div>
                        <h5>Lines of Code</h5>
                    </div>

                    <div class="col_one_fourth nobottommargin center bounceIn animated" data-animate="bounceIn" data-delay="150">
                        <i class="i-plain i-large divcenter nobottommargin icon-briefcase"></i>
                        <div class="counter counter-lined"><span data-from="100" data-to="352" data-refresh-interval="50" data-speed="3500" data-comma="true">352</span></div>
                        <h5>Projects Completed</h5>
                    </div>

                    <div class="col_one_fourth nobottommargin center col_last bounceIn animated" data-animate="bounceIn" data-delay="200">
                        <i class="i-plain i-large divcenter nobottommargin icon-dribbble2"></i>
                        <div class="counter counter-lined"><span data-from="25" data-to="152" data-refresh-interval="30" data-speed="2700" data-comma="true">152</span></div>
                        <h5>Shots on Dribbble</h5>
                    </div>

                </div>

            </div>

            <div class="section footer-stick">

                    <h4 class="uppercase center">What <span>Clients</span> Say?</h4>

                    <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
                        <div class="flexslider" style="height: 227px;">
                            <div class="slider-wrap">
                                <div class="slide" data-thumb-alt="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                                    <div class="testi-image">
                                        <a href="#"><img src="images/testimonials/3.jpg" alt="Customer Testimonails" draggable="false"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?</p>
                                        <div class="testi-meta">
                                            Steve Jobs
                                            <span>Apple Inc.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide flex-active-slide" data-thumb-alt="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
                                    <div class="testi-image">
                                        <a href="#"><img src="images/testimonials/2.jpg" alt="Customer Testimonails" draggable="false"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>
                                        <div class="testi-meta">
                                            Collis Ta'eed
                                            <span>Beyond Glee</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide" data-thumb-alt="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                                    <div class="testi-image">
                                        <a href="#"><img src="images/testimonials/1.jpg" alt="Customer Testimonails" draggable="false"></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
                                        <div class="testi-meta">
                                            John Doe
                                            <span>XYZ Inc.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <ol class="flex-control-nav flex-control-paging"><li data-animate="zoomIn" data-delay="0" class="zoomIn animated"><a href="#" class="">1</a></li><li data-animate="zoomIn" data-delay="200" class="zoomIn animated"><a href="#" class="flex-active">2</a></li><li data-animate="zoomIn" data-delay="400" class="zoomIn animated"><a href="#" class="">3</a></li></ol><ol class="flex-control-nav flex-control-paging"><li data-animate="zoomIn" data-delay="0" class="not-animated"><a href="#">1</a></li><li data-animate="zoomIn" data-delay="200" class="not-animated"><a href="#">2</a></li><li data-animate="zoomIn" data-delay="400" class="not-animated"><a href="#">3</a></li></ol></div>
                    </div>
                </div>
        </div>
    </section>
@endsection