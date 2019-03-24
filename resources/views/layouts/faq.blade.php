@extends('layouts.app')

@section('content')
<div class="content-wrap">
        <div class="container clearfix">
                <div class="postcontent nobottommargin clearfix">
            
                    <ul id="portfolio-filter" class="portfolio-filter clearfix">
            
                        <li class="activeFilter"><a href="#" data-filter="all">All</a></li>
                        <li class=""><a href="#" data-filter=".faq-marketplace">Marketplace</a></li>
                        <li class=""><a href="#" data-filter=".faq-authors">Authors</a></li>
                        <li class=""><a href="#" data-filter=".faq-legal">Legal</a></li>
                        <li class=""><a href="#" data-filter=".faq-itemdiscussion">Item Discussion</a></li>
                        <li class=""><a href="#" data-filter=".faq-affiliates">Affiliates</a></li>
            
                    </ul>
            
                    <div class="clear"></div>
            
                    <div id="faqs" class="faqs">
            
                        <div class="toggle faq faq-marketplace faq-authors" style="">
                            <div class="togglet"><i class="toggle-closed icon-question-sign"></i><i class="toggle-open icon-question-sign"></i>How do I become an author?</div>
                            <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                        </div>
            
                        <div class="toggle faq faq-authors" style="">
                            <div class="togglet"><i class="toggle-closed icon-comments-alt"></i><i class="toggle-open icon-comments-alt"></i>Helpful Resources for Authors</div>
                            <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                        </div>
            
                        <div class="toggle faq" style="">
                            <div class="togglet"><i class="toggle-closed icon-lock3"></i><i class="toggle-open icon-lock3"></i>How much money can I make?</div>
                            <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                        </div>
            
                        <div class="toggle faq faq-authors faq-legal faq-itemdiscussion" style="">
                            <div class="togglet"><i class="toggle-closed icon-download-alt"></i><i class="toggle-open icon-download-alt"></i>Can I offer my items for free on a promotional basis?</div>
                            <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                        </div>
            
                        <div class="toggle faq faq-marketplace faq-authors" style="">
                            <div class="togglet"><i class="toggle-closed icon-ok"></i><i class="toggle-open icon-ok"></i>An Introduction to the Marketplaces for Authors</div>
                            <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                        </div>
            
                        <div class="toggle faq faq-affiliates" style="">
                            <div class="togglet"><i class="toggle-closed icon-money"></i><i class="toggle-open icon-money"></i>How does the Tuts+ Premium affiliate program work?</div>
                            <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                        </div>
            
                        <div class="toggle faq faq-legal faq-itemdiscussion" style="">
                            <div class="togglet"><i class="toggle-closed icon-picture"></i><i class="toggle-open icon-picture"></i>What Images, Videos, Code or Music Can I Use in my Items?</div>
                            <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                        </div>
            
                        <div class="toggle faq faq-legal faq-authors faq-itemdiscussion" style="">
                            <div class="togglet"><i class="toggle-closed icon-file3"></i><i class="toggle-open icon-file3"></i>Can I use trademarked names in my items?</div>
                            <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                        </div>
            
                        <div class="toggle faq faq-affiliates" style="">
                            <div class="togglet"><i class="toggle-closed icon-bar-chart"></i><i class="toggle-open icon-bar-chart"></i>Tips for Increasing Your Referral Income</div>
                            <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                        </div>
            
                        <div class="toggle faq faq-authors faq-itemdiscussion" style="">
                            <div class="togglet"><i class="toggle-closed icon-phone3"></i><i class="toggle-open icon-phone3"></i>How can I get support for an item which isn't working correctly?</div>
                            <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                        </div>
            
                        <div class="toggle faq faq-marketplace faq-itemdiscussion" style="">
                            <div class="togglet"><i class="toggle-closed icon-credit"></i><i class="toggle-open icon-credit"></i>How do I pay for items on the Marketplaces?</div>
                            <div class="togglec" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                        </div>
            
                    </div>
            
            
                </div><!-- .postcontent end -->
            
                <!-- Sidebar
                ============================================= -->
                <div class="sidebar nobottommargin col_last clearfix">
                    <div class="sidebar-widgets-wrap">
            
                        <div class="widget clearfix">
            
                            <h4>Connect with Us</h4>
                            <a href="#" class="social-icon si-colored si-small si-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-delicious" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delicious">
                                <i class="icon-delicious"></i>
                                <i class="icon-delicious"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-android" data-toggle="tooltip" data-placement="top" title="" data-original-title="Android">
                                <i class="icon-android"></i>
                                <i class="icon-android"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-gplus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-stumbleupon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Stumbleupon">
                                <i class="icon-stumbleupon"></i>
                                <i class="icon-stumbleupon"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-foursquare" data-toggle="tooltip" data-placement="top" title="" data-original-title="Foursquare">
                                <i class="icon-foursquare"></i>
                                <i class="icon-foursquare"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-forrst" data-toggle="tooltip" data-placement="top" title="" data-original-title="Forrst">
                                <i class="icon-forrst"></i>
                                <i class="icon-forrst"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-digg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Digg">
                                <i class="icon-digg"></i>
                                <i class="icon-digg"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-spotify" data-toggle="tooltip" data-placement="top" title="" data-original-title="Spotify">
                                <i class="icon-spotify"></i>
                                <i class="icon-spotify"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-reddit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reddit">
                                <i class="icon-reddit"></i>
                                <i class="icon-reddit"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-blogger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Blogger">
                                <i class="icon-blogger"></i>
                                <i class="icon-blogger"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-dribbble" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">
                                <i class="icon-dribbble"></i>
                                <i class="icon-dribbble"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-flickr" data-toggle="tooltip" data-placement="top" title="" data-original-title="Flickr">
                                <i class="icon-flickr"></i>
                                <i class="icon-flickr"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-linkedin" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linked In">
                                <i class="icon-linkedin"></i>
                                <i class="icon-linkedin"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-rss" data-toggle="tooltip" data-placement="top" title="" data-original-title="RSS">
                                <i class="icon-rss"></i>
                                <i class="icon-rss"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-skype" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
                                <i class="icon-skype"></i>
                                <i class="icon-skype"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-youtube" data-toggle="tooltip" data-placement="top" title="" data-original-title="Youtube">
                                <i class="icon-youtube"></i>
                                <i class="icon-youtube"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-vimeo" data-toggle="tooltip" data-placement="top" title="" data-original-title="Vimeo">
                                <i class="icon-vimeo"></i>
                                <i class="icon-vimeo"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-yahoo" data-toggle="tooltip" data-placement="top" title="" data-original-title="Yahoo">
                                <i class="icon-yahoo"></i>
                                <i class="icon-yahoo"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-github" data-toggle="tooltip" data-placement="top" title="" data-original-title="Github">
                                <i class="icon-github-circled"></i>
                                <i class="icon-github-circled"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-tumblr" data-toggle="tooltip" data-placement="top" title="" data-original-title="Trumblr">
                                <i class="icon-tumblr"></i>
                                <i class="icon-tumblr"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-instagram" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">
                                <i class="icon-instagram"></i>
                                <i class="icon-instagram"></i>
                            </a>
            
                            <a href="#" class="social-icon si-colored si-small si-pinterest" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterst">
                                <i class="icon-pinterest"></i>
                                <i class="icon-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($){
        var $faqItems = $('#faqs .faq');
        if( window.location.hash != '' ) {
            var getFaqFilterHash = window.location.hash;
            var hashFaqFilter = getFaqFilterHash.split('#');
            if( $faqItems.hasClass( hashFaqFilter[1] ) ) {
                $('#portfolio-filter li').removeClass('activeFilter');
                $( '[data-filter=".'+ hashFaqFilter[1] +'"]' ).parent('li').addClass('activeFilter');
                var hashFaqSelector = '.' + hashFaqFilter[1];
                $faqItems.css('display', 'none');
                if( hashFaqSelector != 'all' ) {
                    $( hashFaqSelector ).fadeIn(500);
                } else {
                    $faqItems.fadeIn(500);
                }
            }
        }

        $('#portfolio-filter a').click(function(){
            $('#portfolio-filter li').removeClass('activeFilter');
            $(this).parent('li').addClass('activeFilter');
            var faqSelector = $(this).attr('data-filter');
            $faqItems.css('display', 'none');
            if( faqSelector != 'all' ) {
                $( faqSelector ).fadeIn(500);
            } else {
                $faqItems.fadeIn(500);
            }
            return false;
       });
    });
</script>
@endsection