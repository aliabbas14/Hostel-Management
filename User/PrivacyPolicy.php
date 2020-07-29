<!DOCTYPE html>
<html>
    <head>
	
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
        <title>Privacy Policy</title>
         <style>
            .tos{
            margin: 30px;
            padding: 10px;
            background-color: white;
            color:black;
            font-size: 20px;
            }
            .title{
                text-align: center;
                color: black;
                font-weight:bolder;
				font-size:50px;
            }
            p{
                margin-left: 3px;
                margin-right: 3px;
            }
            .disclaimer
            {
             font-weight:bold;
			 font-family: 'Open Sans', sans-serif;
             font-size: 15px;
            }
             .heading 
            {
                background-color: #eee;
                color: #444;
                cursor: pointer;
                padding: 18px;
                width: 80%;
                border: none;
                text-align: left;
                outline: none;
                font-size: 20px;
                transition: 0.4s;
            }

            .active, .heading:hover {
                background-color: #ccc;
            }

            .heading:after {
                content: '\002B';
                color: #777;
                font-weight: bold;
                float: right;
                margin-left: 5px;
            }

            .active:after {
                content: "\2212";
            }

            .content {    
                background:white;
                margin:2% 12%; 
                max-height: 0;
                overflow: hidden;
                font-weight: bold;
                font-size: 40px;
                transition: max-height 0.2s ease-out;
				font-family: 'Open Sans', sans-serif;
            }
			.tspan{
					color: #ef5861;
			}
          
        
        </style>
         
    </head>
    <body>
       <?php
       include_once("header2.php");
       ?>
     <section style="margin-top: 40px;padding-bottom:10px;" id="portfolio" class="portfolio-section-1">

          
                        <div class="section-title text-center">
                            <h3 class="title"><span class="tspan">P</span>rivacy Policy</h3>
                        </div>
         <div class="tos">
             <p class="disclaimer">This privacy policy has been compiled to better serve those who are concerned with how their personal information is being used online.  Please read our privacy policy carefully to get a clear understanding of how we collect, use, protect or otherwise handle your Personally Identifiable Information in accordance with our website.</p>
             
         </div>
             
             <div class="container">
                 <div class="text-center">
             
                       <button class="heading">What personal information do we collect from the people that visit our blog, website or app?
                       </button>
                     <div class="content">
                         <p class="disclaimer">
                           When ordering or registering on our site, as appropriate, you may be asked to enter your or other details to help you with your experience.  
                         </p>
                     </div>
            <button class="heading">When do we collect information?

                            </button>
                     <div class="content">
                         <p class="disclaimer" >
                             We collect information from you when you or enter information on our site.

                         </p>
                     </div>
                 <button class="heading">How do we use your information? 
                            </button>
                     <div class="content">
                         <p class="disclaimer">
                             We may use the information we collect from you when you register, make a purchase, sign up for our newsletter, respond to a survey or marketing communication, surf the website, or use certain other site features in the following ways:
                         </p>
                     </div>
                 <button class="heading">Do we use 'cookies'?

                            </button>
                     <div class="content">
                         <p class="disclaimer">
                             
Yes. Cookies are small files that a site or its service provider transfers to your computer's hard drive through your Web browser (if you allow) that enables the site's or service provider's systems to recognize your browser and capture and remember certain information. For instance, we use cookies to help us remember and process the items in your shopping cart. They are also used to help us understand your preferences based on previous or current site activity, which enables us to provide you with improved services. We also use cookies to help us compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.
                         </p>
                     </div>
                 <button class="heading">Third-party disclosure

                            </button>
                     <div class="content">
                         <p class="disclaimer">
                             We do not sell, trade, or otherwise transfer to outside parties your Personally Identifiable Information unless we provide users with advance notice. This does not include website hosting partners and other parties who assist us in operating our website, conducting our business, or serving our users, so long as those parties agree to keep this information confidential. We may also release information when it's release is appropriate to comply with the law, enforce our site policies, or protect ours or others' rights, property or safety. 

                         </p>
                     </div>
                 <button class="heading">Third-party links
                            </button>
                     <div class="content">
                         <p class="disclaimer">
                             Occasionally, at our discretion, we may include or offer third-party products or services on our website. These third-party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these sites.
                         </p>
                     </div>
                 <button class="heading">Contacting us

                            </button>
                     <div class="content">
                         <p class="disclaimer">
                             
                         


                         </p>
                     </div>
                </div>
                                     </div>           
             
           <!-- <h4 class="title">Last Edited on 2018-01-28</h4>-->
			       <script>
		var acc = document.getElementsByClassName("heading");
		var i;
	
		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
		  this.classList.toggle("active");
		    var panel = this.nextElementSibling;
		    if (panel.style.maxHeight){
		      panel.style.maxHeight = null;
		    } 
		    else {
		      panel.style.maxHeight = panel.scrollHeight + "px";
		    } 
		  });
		}

	</script>    
             
       <?php
	include_once('footer.php');
	?>                
    </body>
</html>
