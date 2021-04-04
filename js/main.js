

//Instagram Footer Script
    !function(e,t){"function"==typeof define&&define.amd?define([],t):"object"==typeof exports?module.exports=t():e.InstagramFeed=t()}(this,function(){var t={host:"https://www.instagram.com/",username:"",tag:"",container:"",display_profile:!0,display_biography:!0,display_gallery:!0,display_igtv:!1,get_data:!1,callback:null,styling:!0,items:8,items_per_row:4,margin:.5,image_size:640},_={150:0,240:1,320:2,480:3,640:4},m={"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;","/":"&#x2F;","`":"&#x60;","=":"&#x3D;"};return function(e){this.options=Object.assign({},t),this.options=Object.assign(this.options,e),this.is_tag=""==this.options.username,this.valid=!0,""==this.options.username&&""==this.options.tag?(console.error("InstagramFeed: Error, no username or tag defined."),this.valid=!1):this.options.get_data||""!=this.options.container?this.options.get_data&&"function"!=typeof this.options.callback&&(console.error("InstagramFeed: Error, invalid or undefined callback for get_data"),this.valid=!1):(console.error("InstagramFeed: Error, no container found."),this.valid=!1),this.get=function(i){var s=this.is_tag?this.options.host+"explore/tags/"+this.options.tag:this.options.host+this.options.username,a=new XMLHttpRequest,o=this;a.onload=function(e){var t;4===a.readyState&&(200===a.status?(t=a.responseText.split("window._sharedData = ")[1].split("<\/script>")[0],null===(t=(t=JSON.parse(t.substr(0,t.length-1))).entry_data.ProfilePage||t.entry_data.TagPage||null)?(console.log(s),console.error("InstagramFeed: Request error. No data retrieved: "+a.statusText)):(t=t[0].graphql.user||t[0].graphql.hashtag,i(t,o))):console.error("InstagramFeed: Request error. Response: "+a.statusText))},a.open("GET",s,!0),a.send()},this.parse_caption=function(e,t){return void 0!==e.node.edge_media_to_caption.edges[0]&&0!=e.node.edge_media_to_caption.edges[0].node.text.length?e.node.edge_media_to_caption.edges[0].node.text:void 0!==e.node.title&&0!=e.node.title.length?e.node.title:void 0!==e.node.accessibility_caption&&0!=e.node.accessibility_caption.length?e.node.accessibility_caption:(this.is_tag?t.name:t.username)+" image "},this.display=function(e){var t,i;i=this.options.styling?(t=(100-2*this.options.margin*this.options.items_per_row)/this.options.items_per_row,{profile_container:" style='text-align:center;'",profile_image:" style='border-radius:10em;width:15%;max-width:125px;min-width:50px;'",profile_name:" style='font-size:1.2em;'",profile_biography:" style='font-size:1em;'",gallery_image:" style='margin:"+this.options.margin+"% "+this.options.margin+"%;width:"+t+"%;float:left;'"}):{profile_container:"",profile_image:"",profile_name:"",profile_biography:"",gallery_image:""};var s="";if(this.options.display_profile&&(s+="<div class='instagram_profile'"+i.profile_container+">",s+="<img class='instagram_profile_image' src='"+e.profile_pic_url+"' alt='"+(this.is_tag?e.name+" tag pic":e.username+" profile pic")+" profile pic'"+i.profile_image+" />",this.is_tag?s+="<p class='instagram_tag'"+i.profile_name+"><a href='https://www.instagram.com/explore/tags/"+this.options.tag+"' rel='noopener' target='_blank'>#"+this.options.tag+"</a></p>":s+="<p class='instagram_username'"+i.profile_name+">@"+e.full_name+" (<a href='https://www.instagram.com/"+this.options.username+"' rel='noopener' target='_blank'>@"+this.options.username+"</a>)</p>",!this.is_tag&&this.options.display_biography&&(s+="<p class='instagram_biography'"+i.profile_biography+">"+e.biography+"</p>"),s+="</div>"),this.options.display_gallery){var a=void 0!==_[this.options.image_size]?_[this.options.image_size]:_[640];if(void 0!==e.is_private&&!0===e.is_private)s+="<p class='instagram_private'><strong>This profile is private</strong></p>";else{var o=(e.edge_owner_to_timeline_media||e.edge_hashtag_to_media).edges,n=o.length>this.options.items?this.options.items:o.length;s+="<div class='instagram_gallery'>";for(var r=0;r<n;r++){var l,p,g="https://www.instagram.com/p/"+o[r].node.shortcode,d=this.parse_caption(o[r],e).replace(/[&<>"'`=\/]/g,function(e){return m[e]});switch(o[r].node.__typename){case"GraphSidecar":p="sidecar",l=o[r].node.thumbnail_resources[a].src;break;case"GraphVideo":p="video",l=o[r].node.thumbnail_src;break;default:p="image",l=o[r].node.thumbnail_resources[a].src}this.is_tag&&(e.username=""),s+="<a href='"+g+"' class='instagram-"+p+"' title='"+d+"' rel='noopener' target='_blank'>",s+="<img src='"+l+"' alt='"+d+"'"+i.gallery_image+" />",s+="</a>"}s+="</div>"}}if(this.options.display_igtv&&void 0!==e.edge_felix_video_timeline){var h=e.edge_felix_video_timeline.edges,n=h.length>this.options.items?this.options.items:h.length;if(0<h.length){s+="<div class='instagram_igtv'>";for(r=0;r<n;r++){s+="<a href='"+(g="https://www.instagram.com/p/"+h[r].node.shortcode)+"' rel='noopener' title='"+(d=this.parse_caption(h[r],e))+"' target='_blank'>",s+="<img src='"+h[r].node.thumbnail_src+"' alt='"+d+"'"+i.gallery_image+" />",s+="</a>"}s+="</div>"}}this.options.container.innerHTML=s},this.run=function(){this.get(function(e,t){t.options.get_data?t.options.callback(e):t.display(e)})},this.valid&&this.run()}});


    

//Footer Scripts
(function(){ new InstagramFeed({
'username': 'instagram',
'container': document.getElementById("instagram-feed"),
'display_profile': false,
'display_biography': false,
'display_gallery': true,
'callback': true,
'styling': false,
'items': 5,
'items_per_row': 5,
'margin': 0,
'image_size': 320
});
})();

//Header Scripts
$(document).ready(function() {


  $('.feature-inner').slick({
      lazyLoad: 'ondemand',
      dots: false,
      infinite: false,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 5000
  });

  $('.photos').slick({
      lazyLoad: 'ondemand',
      dots: false,
      infinite: false,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: false,
      autoplaySpeed: 5000
  });

  $('.as-seen-imgs').slick({
      lazyLoad: 'ondemand',
      dots: false,
      infinite: false,
      speed: 500,
      slidesToShow: 5,
      slidesToScroll: 5,
      autoplay: false,
      autoplaySpeed: 5000
  });

  

});


// Avoid `console` errors in browsers that lack a console.
!function(){for(var e,n=function(){},o=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeline","timelineEnd","timeStamp","trace","warn"],i=o.length,r=window.console=window.console||{};i--;)r[e=o[i]]||(r[e]=n)}();

//TOGGLE HAMBURGER MENU
$('#nav-icon').on('click', function() {
   $(this).toggleClass('open');
   $('#overlay').toggleClass('open');
   $("body").toggleClass('overflow-hidden');

  });



//Mobile Functions

$(document).ready(function(){

   var window_width = $( window ).width();

   if (window_width >= 768) {
     //Desktop Function
     scrollToTop();
     mySticky();
     

   } 
   else {
     //else function
     

   }
   //Function Definition
   // function fn_name() {

      
   //  }

   function scrollToTop(){
      $(window).on('scroll', function(){
         if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
         } else {
            $('.scrollup').fadeOut();
         }
      }); 
 
      $('.scrollup').on('click', function(){
         $("html, body").animate({ scrollTop: 0 }, 600);
         return false;
      });
   }//End of ScrollToTop

   // function mySticky(){
   //    $('.main-content-wrapper, .sidebar-content').theiaStickySidebar({
   //       // Settings
   //       additionalMarginTop: 30
   //     });



   // }
   
   //End of mySticky











});//End of Mobile Functions





 // Light and Dark Mode  

 $(document).ready(function() {
   // Check LocalStorage for Existing Key and set Mode
     if (localStorage.getItem("mode") == "dark") {
     $( "body" ).addClass( "dark" );
     $( ".dark-light-switch i" ).removeClass('fa-moon');
     $( ".dark-light-switch i" ).addClass("fa-sun");
     } else if (localStorage.getItem("mode") == "light"){
         $( "body" ).removeClass( "dark" );
         $( ".dark-light-switch i" ).removeClass('fa-sun');
         $( ".dark-light-switch i" ).addClass("fa-moon");
     }
   // Check LocalStorage for Existing Key then Detect Browswer "prefers-color-scheme" and set Mode
     var mq = window.matchMedia( '(prefers-color-scheme: dark)' );
     if (localStorage.getItem("mode") == "light"){
         $( "body" ).removeClass( "dark" );
         $( ".dark-light-switch i" ).removeClass('fa-sun');
         $( ".dark-light-switch i" ).addClass("fa-moon");
     } else if ( mq.matches ){
         $( "body" ).addClass( "dark" );
         $( ".dark-light-switch i" ).removeClass('fa-moon');
         $( ".dark-light-switch i" ).addClass("fa-sun");
     }
 });
// Toggle Mode and set LocalStorage Key
 $( ".dark-light-switch i" ).on("click", function() {
     if( $( "body" ).hasClass( "dark" )) {
       $( "body" ).removeClass( "dark" );
       $( ".dark-light-switch i" ).removeClass('fa-sun');
       $( ".dark-light-switch i" ).addClass("fa-moon");
       localStorage.setItem("mode","light");
     } else {
       $( "body" ).addClass( "dark" );
       $( ".dark-light-switch i" ).removeClass('fa-moon');
       $( ".dark-light-switch i" ).addClass("fa-sun");
       localStorage.setItem("mode","dark");
     }
 });

/*
    A simple jQuery modal (http://github.com/kylefox/jquery-modal)
    Version 0.9.1
*/
!function(o){"object"==typeof module&&"object"==typeof module.exports?o(require("jquery"),window,document):o(jQuery,window,document)}(function(o,t,i,e){var s=[],l=function(){return s.length?s[s.length-1]:null},n=function(){var o,t=!1;for(o=s.length-1;o>=0;o--)s[o].$blocker&&(s[o].$blocker.toggleClass("current",!t).toggleClass("behind",t),t=!0)};o.modal=function(t,i){var e,n;if(this.$body=o("body"),this.options=o.extend({},o.modal.defaults,i),this.options.doFade=!isNaN(parseInt(this.options.fadeDuration,10)),this.$blocker=null,this.options.closeExisting)for(;o.modal.isActive();)o.modal.close();if(s.push(this),t.is("a"))if(n=t.attr("href"),this.anchor=t,/^#/.test(n)){if(this.$elm=o(n),1!==this.$elm.length)return null;this.$body.append(this.$elm),this.open()}else this.$elm=o("<div>"),this.$body.append(this.$elm),e=function(o,t){t.elm.remove()},this.showSpinner(),t.trigger(o.modal.AJAX_SEND),o.get(n).done(function(i){if(o.modal.isActive()){t.trigger(o.modal.AJAX_SUCCESS);var s=l();s.$elm.empty().append(i).on(o.modal.CLOSE,e),s.hideSpinner(),s.open(),t.trigger(o.modal.AJAX_COMPLETE)}}).fail(function(){t.trigger(o.modal.AJAX_FAIL);var i=l();i.hideSpinner(),s.pop(),t.trigger(o.modal.AJAX_COMPLETE)});else this.$elm=t,this.anchor=t,this.$body.append(this.$elm),this.open()},o.modal.prototype={constructor:o.modal,open:function(){var t=this;this.block(),this.anchor.blur(),this.options.doFade?setTimeout(function(){t.show()},this.options.fadeDuration*this.options.fadeDelay):this.show(),o(i).off("keydown.modal").on("keydown.modal",function(o){var t=l();27===o.which&&t.options.escapeClose&&t.close()}),this.options.clickClose&&this.$blocker.click(function(t){t.target===this&&o.modal.close()})},close:function(){s.pop(),this.unblock(),this.hide(),o.modal.isActive()||o(i).off("keydown.modal")},block:function(){this.$elm.trigger(o.modal.BEFORE_BLOCK,[this._ctx()]),this.$body.css("overflow","hidden"),this.$blocker=o('<div class="'+this.options.blockerClass+' blocker current"></div>').appendTo(this.$body),n(),this.options.doFade&&this.$blocker.css("opacity",0).animate({opacity:1},this.options.fadeDuration),this.$elm.trigger(o.modal.BLOCK,[this._ctx()])},unblock:function(t){!t&&this.options.doFade?this.$blocker.fadeOut(this.options.fadeDuration,this.unblock.bind(this,!0)):(this.$blocker.children().appendTo(this.$body),this.$blocker.remove(),this.$blocker=null,n(),o.modal.isActive()||this.$body.css("overflow",""))},show:function(){this.$elm.trigger(o.modal.BEFORE_OPEN,[this._ctx()]),this.options.showClose&&(this.closeButton=o('<a href="#close-modal" rel="modal:close" class="close-modal '+this.options.closeClass+'">'+this.options.closeText+"</a>"),this.$elm.append(this.closeButton)),this.$elm.addClass(this.options.modalClass).appendTo(this.$blocker),this.options.doFade?this.$elm.css({opacity:0,display:"inline-block"}).animate({opacity:1},this.options.fadeDuration):this.$elm.css("display","inline-block"),this.$elm.trigger(o.modal.OPEN,[this._ctx()])},hide:function(){this.$elm.trigger(o.modal.BEFORE_CLOSE,[this._ctx()]),this.closeButton&&this.closeButton.remove();var t=this;this.options.doFade?this.$elm.fadeOut(this.options.fadeDuration,function(){t.$elm.trigger(o.modal.AFTER_CLOSE,[t._ctx()])}):this.$elm.hide(0,function(){t.$elm.trigger(o.modal.AFTER_CLOSE,[t._ctx()])}),this.$elm.trigger(o.modal.CLOSE,[this._ctx()])},showSpinner:function(){this.options.showSpinner&&(this.spinner=this.spinner||o('<div class="'+this.options.modalClass+'-spinner"></div>').append(this.options.spinnerHtml),this.$body.append(this.spinner),this.spinner.show())},hideSpinner:function(){this.spinner&&this.spinner.remove()},_ctx:function(){return{elm:this.$elm,$elm:this.$elm,$blocker:this.$blocker,options:this.options}}},o.modal.close=function(t){if(o.modal.isActive()){t&&t.preventDefault();var i=l();return i.close(),i.$elm}},o.modal.isActive=function(){return s.length>0},o.modal.getCurrent=l,o.modal.defaults={closeExisting:!0,escapeClose:!0,clickClose:!0,closeText:"Close",closeClass:"",modalClass:"modal",blockerClass:"jquery-modal",spinnerHtml:'<div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div>',showSpinner:!0,showClose:!0,fadeDuration:null,fadeDelay:1},o.modal.BEFORE_BLOCK="modal:before-block",o.modal.BLOCK="modal:block",o.modal.BEFORE_OPEN="modal:before-open",o.modal.OPEN="modal:open",o.modal.BEFORE_CLOSE="modal:before-close",o.modal.CLOSE="modal:close",o.modal.AFTER_CLOSE="modal:after-close",o.modal.AJAX_SEND="modal:ajax:send",o.modal.AJAX_SUCCESS="modal:ajax:success",o.modal.AJAX_FAIL="modal:ajax:fail",o.modal.AJAX_COMPLETE="modal:ajax:complete",o.fn.modal=function(t){return 1===this.length&&new o.modal(this,t),this},o(i).on("click.modal",'a[rel~="modal:close"]',o.modal.close),o(i).on("click.modal",'a[rel~="modal:open"]',function(t){t.preventDefault(),o(this).modal()})});

