@extends('layouts.app')

@section('content')

<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_10 overlay" style="height: 350px !important;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="destination_details_info">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact_join">
                    <h3>Customize a meal</h3>
                    <form action={{route('storeCustomizeMeal',app()->getLocale())}} method="post" enctype="multipart/form-data"  class="probootstrap-form">
                        {{ csrf_field() }}
                        @include('inc.alert')
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-10">
                                    <input type="text" name="first_name" placeholder="First Name"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required
                                        class="single-input-primary">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                    <div class="mt-10">
                                        <input type="text" name="last_name" placeholder="Last Name"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required
                                            class="single-input-primary">
                                    </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-10">
                                    <input type="text" name="phone" placeholder="Phone Number"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" required
                                    class="single-input-primary">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-10">
                                    <input type="email" name="EMAIL" placeholder="Email address"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail address'" required
                                        class="single-input-primary">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mt-10">
                                    <input type="text" name="title" placeholder="meal title"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Meal title'" required
                                        class="single-input-primary">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mt-10">
                                    <textarea class="single-textarea single-input-primary" name="Message" placeholder="Message" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Message'" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <div class="box">
                                      <input id="one" type="checkbox" required>
                                      <span class="check"></span>
                                      <label for="one">I Agree <u><a class="popup_link" href="#open-modal">term conditions</a></u> <span class="span_required">*</span></label>
                                    </div>
                                    <div class="box">
                                      <input id="two" type="checkbox" required>
                                      <span class="check"></span>
                                      <label for="two">I Agree <u><a class="popup_link" href="#open-modal1">privacy policy</a></u> <span class="span_required">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mt-10">
                                    <div class="submit_btn">
                                        <button class="boxed-btn4" type="submit">Send Request</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- newletter_area_start  -->
    <form action={{route('storeemail',app()->getLocale())}} method="post" enctype="multipart/form-data"  class="probootstrap-form">
        {{ csrf_field() }}
    <div class="newletter_area overlay">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="newsletter_text">
                                <h4>{!!__('newsletter.title')!!}</h4>
                                <p>{!!__('newsletter.sentence')!!}</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="mail_form">
                                <div class="row no-gutters">
                                    <div class="col-lg-9 col-md-8">
                                        <div class="newsletter_field">
                                            <input type="email" placeholder="Your mail" >
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="newsletter_btn">
                                            <button class="boxed-btn4 " type="submit" >{!!__('newsletter.subscribe')!!}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <!-- newletter_area_end  -->

    	<!-- Modal -->
        <div id="open-modal" class="modal-window">
            <div>
              <a href="#" title="Close" class="modal-close">Close</a>
              <h1 class="modal_title"> Terms and Conditions</h1>
              <div class="modal_body">
                <h2 style="color: white">Welcome to GeniFresh!</h2>

                These terms and conditions outline the rules and regulations for the use of GeniFresh's Website, located at NorthExplorer.com.

                By accessing this website we assume you accept these terms and conditions. Do not continue to use GeniFresh if you do not agree to take all of the terms and conditions stated on this page.

                The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.
                <br><br>
                <h4 style="color:white; text-decoration:underline">Cookies</h4>
                We employ the use of cookies. By accessing GeniFresh, you agreed to use cookies in agreement with the GeniFresh's Privacy Policy.

                Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.
                <br><br>
                <h4 style="color:white; text-decoration:underline">License</h4>
                Unless otherwise stated, GeniFresh and/or its licensors own the intellectual property rights for all material on GeniFresh. All intellectual property rights are reserved. You may access this from GeniFresh for your own personal use subjected to restrictions set in these terms and conditions.
                <br>
                You must not:
                <br>
                Republish material from GeniFresh<br>
                Sell, rent or sub-license material from GeniFresh<br>
                Reproduce, duplicate or copy material from GeniFresh<br>
                Redistribute content from GeniFresh<br>
                This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the Terms And Conditions Generator and the Privacy Policy Generator.
                <br>
                Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. GeniFresh does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of GeniFresh,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, GeniFresh shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.
                <br>
                GeniFresh reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.
                <br>
                You warrant and represent that:
                <br>
                You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;<br>
                The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;<br>
                The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy<br>
                The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.<br>
                You hereby grant GeniFresh a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.<br>
                <br>
                <h4 style="color:white; text-decoration:underline">Hyperlinking to our Content</h4>
                <br>
                The following organizations may link to our Website without prior written approval:
                <br>
                Government agencies;<br>
                Search engines;<br>
                News organizations;<br>
                Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and
                System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.<br>
                These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.
                <br>
                We may consider and approve other link requests from the following types of organizations:
                <br>
                commonly-known consumer and/or business information sources;<br>
                dot.com community sites;<br>
                associations or other groups representing charities;<br>
                online directory distributors;<br>
                internet portals;<br>
                accounting, law and consulting firms; and
                educational institutions and trade associations.<br>
                We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of GeniFresh; and (d) the link is in the context of general resource information.
                <br>
                These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.
                <br>
                If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to GeniFresh. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.
                <br>
                Approved organizations may hyperlink to our Website as follows:
                <br>
                By use of our corporate name; or<br>
                By use of the uniform resource locator being linked to; or<br>
                By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.<br>
                No use of GeniFresh's logo or other artwork will be allowed for linking absent a trademark license agreement.<br>
                <br>
                <h4 style="color:white; text-decoration:underline">iFrames</h4>
                <br>
                Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.
                <br>
                <br>
                <h4 style="color:white; text-decoration:underline">Content Liability</h4>
                <br>
                We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.
                <br>
                <br>
                <h4 style="color:white; text-decoration:underline">Your Privacy</h4>
                Please read Privacy Policy
                <br><br>
                <h4 style="color:white; text-decoration:underline">Reservation of Rights</h4>
                <br>
                We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.
                <br><br>
                <h4 style="color: white">Removal of links from our website</h4>
                <br>
                If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.
                <br>
                We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.
                <br><br>
                <h4 style="color: white">Disclaimer</h4>
                <br>
                To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:
                <br>
                limit or exclude our or your liability for death or personal injury;<br>
                limit or exclude our or your liability for fraud or fraudulent misrepresentation;<br>
                limit any of our or your liabilities in any way that is not permitted under applicable law; or<br>
                exclude any of our or your liabilities that may not be excluded under applicable law.<br>
                The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.
                <br><br>
                As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.
            </div>
            </div>
        </div>

        <div id="open-modal1" class="modal-window">
            <div>
              <a href="#" title="Close" class="modal-close">Close</a>
              <h1 class="modal_title"> Privacy Policy</h1>
              <div class="modal_body">
                At GeniFresh, accessible from NorthExplorer.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by GeniFresh and how we use it.
                <br>
                If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.
                <br>
                This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in GeniFresh. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the Privacy Policy Generator and the Free Privacy Policy Generator.
                <br><br>
                <h4 style="color: white; text-decoration:underline;">Consent</h4>
                <br>
                By using our website, you hereby consent to our Privacy Policy and agree to its terms. For our Terms and Conditions, please visit the Terms & Conditions Generator.
                <br><br>
                <h4 style="color: white; text-decoration:underline;">Information we collect</h4>
                <br>
                The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.
                <br>
                If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.
                <br>
                When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.
                <br><br>
                <h4 style="color: white; text-decoration:underline;">How we use your information</h4>
                <br>
                We use the information we collect in various ways, including to:
                <br>
                Provide, operate, and maintain our website<br>
                Improve, personalize, and expand our website<br>
                Understand and analyze how you use our website<br>
                Develop new products, services, features, and functionality<br>
                Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the webste, and for marketing and promotional purposes<br>
                Send you emails<br>
                Find and prevent fraud<br>
                Log Files<br>
                GeniFresh follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.
                <br><br>
                <h4 style="color: white; text-decoration:underline;">Cookies and Web Beacons</h4>
                <br>
                Like any other website, GeniFresh uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.
                <br>
                For more general information on cookies, please read "What Are Cookies" from Cookie Consent.
                <br><br>
                <h4 style="color: white; text-decoration:underline;">Google DoubleClick DART Cookie</h4>
                <br>
                Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – https://policies.google.com/technologies/ads
                <br><br>
                <h4 style="color: white; text-decoration:underline;">Advertising Partners Privacy Policies</h4>
                <br>
                You may consult this list to find the Privacy Policy for each of the advertising partners of GeniFresh.
                <br>
                Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on GeniFresh, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.
                <br>
                Note that GeniFresh has no access to or control over these cookies that are used by third-party advertisers.
                <br><br>
                <h4 style="color: white; text-decoration:underline;">Third Party Privacy Policies</h4>
                <br>
                GeniFresh's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.
                <br>
                You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.
                <br><br>
                <h4 style="color: white; text-decoration:underline;">CCPA Privacy Rights (Do Not Sell My Personal Information)</h4>
                <br>
                Under the CCPA, among other rights, California consumers have the right to:
                <br>
                Request that a business that collects a consumer's personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.
                <br>
                Request that a business delete any personal data about the consumer that a business has collected.
                <br>
                Request that a business that sells a consumer's personal data, not sell the consumer's personal data.
                <br>
                If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.
                <br><br>
                <h4 style="color: white; text-decoration:underline;">GDPR Data Protection Rights</h4>
                <br>
                We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:
                <br>
                The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.
                <br>
                The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.
                <br>
                The right to erasure – You have the right to request that we erase your personal data, under certain conditions.
                <br>
                The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.
                <br>
                The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.
                <br>
                The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.
                <br>
                If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.
                <br><br>
                <h4 style="color: white; text-decoration:underline;">Children's Information</h4>
                <br>
                Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.
                <br>
                GeniFresh does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.
            </div>
            </div>
        </div>




@endsection
