<div>
  
 
<style>
        :root{
            --orange:#ff7a00;
            --blue:#0d6efd;
            --bg:#f8f9fc;
            --text:#1f2937;
            --muted:#64748b;
        }

        .rr-contact-section{
            padding:100px 0;
            background:
                radial-gradient(circle at top right,
                rgba(255,122,0,.10),
                transparent 30%),
                radial-gradient(circle at bottom left,
                rgba(13,110,253,.10),
                transparent 30%),
                #f8f9fc;
        }

        .section-header{
            text-align:center;
            margin-bottom:70px;
        }

        .section-header span{
            color:var(--orange);
            font-size:14px;
            font-weight:700;
            letter-spacing:4px;
            text-transform:uppercase;
        }

        .section-header h2{
            font-size:52px;
            font-weight:700;
            color:#111827;
            margin:15px 0;
        }

        .section-header p{
            color:var(--muted);
            max-width:650px;
            margin:auto;
            line-height:1.8;
        }

        .contact-grid{
            display:grid;
            grid-template-columns:1fr 1.2fr;
            gap:35px;
        }

        .contact-info-card,
        .contact-form-card{
            background:#fff;
            border-radius:24px;
            padding:40px;
            box-shadow:
                0 10px 30px rgba(0,0,0,.05),
                0 20px 60px rgba(0,0,0,.05);
        }

        .contact-info-card h3,
        .contact-form-card h3{
            color:var(--blue);
            font-size:28px;
            margin-bottom:35px;
        }

        .info-item{
            display:flex;
            gap:18px;
            margin-bottom:30px;
        }

        .info-item:last-child{
            margin-bottom:0;
        }

        .info-item i{
            width:60px;
            height:60px;
            min-width:60px;
            border-radius:18px;
            background:linear-gradient(
                135deg,
                var(--blue),
                var(--text)
            );
            color:#fff;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:22px;
        }

        .info-item h4{
            margin-bottom:8px;
            color:#111827;
            font-size:18px;
        }

        .info-item p{
            color:var(--muted);
            margin:0;
            line-height:1.8;
        }

        .row{
            display:flex;
            gap:20px;
        }

        .col-md-6{
            flex:1;
        }

        .contact-form-card input,
        .contact-form-card select,
        .contact-form-card textarea{
            width:100%;
            border:1px solid #e5e7eb;
            border-radius:14px;
            padding:15px 18px;
            margin-bottom:20px;
            background:#fff;
        }

        .contact-form-card input:focus,
        .contact-form-card select:focus,
        .contact-form-card textarea:focus{
            outline:none;
            border-color:var(--blue);
            box-shadow:0 0 0 4px rgba(13,110,253,.12);
        }

        .luxury-btn{
            background:linear-gradient(
                135deg,
                var(--blue),
                var(--text)
            );
            color:#fff;
            border:none;
            padding:16px 35px;
            border-radius:14px;
            font-weight:600;
            cursor:pointer;
            transition:.3s;
        }

        .luxury-btn:hover{
            transform:translateY(-3px);
        }

        @media(max-width:991px){
            .contact-grid{
                grid-template-columns:1fr;
            }
        }

        @media(max-width:768px){

            .row{
                flex-direction:column;
                gap:0;
            }

            .section-header h2{
                font-size:38px;
            }

            .contact-info-card,
            .contact-form-card{
                padding:25px;
            }
        }
</style>

<section class="rr-contact-section">
    <div class="container">

        <div class="section-header">
            <span>RR GEMS</span>
            <h2>Get In Touch</h2>
            <p>
                Looking for certified gemstones or custom jewelry?
                Our experts are here to assist you.
            </p>
        </div>

        <div class="contact-grid">

            <div class="contact-info-card">

                <h3>Contact Information</h3>
                <div class="info-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <div>
                        <h4>Office Address</h4>
                        <p>
                            102, Palace Road, <br> opposite City Palace,Udaipur, Rajasthan - 313001
                        </p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fa-solid fa-envelope"></i>
                    <div>
                        <h4>Email</h4>
                        <p>sales@rrgems.com</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fa-solid fa-phone"></i>
                    <div>
                        <h4>Phone & WhatsApp</h4>
                        <p>+91 93528 56317</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fa-solid fa-clock"></i>
                    <div>
                        <h4>Working Hours</h4>
                        <p>Mon - Sat : 10:00 AM - 7:00 PM</p>
                    </div>
                </div>

            </div>

            <div class="contact-form-card">

                <h3>Send an Enquiry</h3>

                <form>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" placeholder="Full Name">
                        </div>

                        <div class="col-md-6">
                            <input type="email" placeholder="Email Address">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" placeholder="Phone Number">
                        </div>

                        <div class="col-md-6">
                            <select>
                                <option>Select Gemstone</option>
                                <option>Ruby</option>
                                <option>Emerald</option>
                                <option>Sapphire</option>
                                <option>Yellow Sapphire</option>
                            </select>
                        </div>
                    </div>

                    <textarea rows="6" placeholder="Tell us your requirement"></textarea>

                    <button type="submit" class="luxury-btn">
                        Send Message
                    </button>

                </form>

            </div>

        </div>

    </div>
</section>


<section class="rr-map-section">
    <div class="container">

        <div class="map-heading">
            <span>Visit Our Showroom</span>
            <h2>Find RR Gems in the Heart of Udaipur</h2>
        </div>

        <div class="map-wrapper">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3448.6440848217244!2d73.686051!3d24.583586!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3967e56f757a4bd3%3A0x869e3ce891b5f21!2sRR%20Gems%20%26%20Jewels%20-%20Best%20Natural%20Gemstone%20Shop%20%7C%20Diamond%20%7C%20Sapphire%20%7C%20Emerald%20%7C%20Ruby%20%7C%20CVD%20Stone%20%7C!5e1!3m2!1sen!2sin!4v1781007717853!5m2!1sen!2sin"
                 width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>
</section>

<style>
    .rr-map-section{
        padding:100px 0;
        background:#faf9f6;
    }

    .map-heading{
        text-align:center;
        margin-bottom:40px;
    }

    .map-heading span{
        display:inline-block;
        color:#c48a2c;
        font-weight:600;
        letter-spacing:3px;
        text-transform:uppercase;
        margin-bottom:12px;
    }

    .map-heading h2{
        font-size:48px;
        font-weight:700;
        color:#111827;
        margin:0;
    }

    .map-wrapper{
        overflow:hidden;
        border-radius:30px;
        box-shadow:
        0 20px 60px rgba(0,0,0,.08);
        border:1px solid rgba(0,0,0,.05);
    }

    .map-wrapper iframe{
        width:100%;
        height:600px;
        border:0;
        display:block;
    }

    @media(max-width:768px){

    .map-heading h2{
        font-size:32px;
    }

    .map-wrapper iframe{
        height:450px;
    }

    }
</style>


<section class="rr-social-bar">
    <div class="container">

        <div class="social-wrapper">

            <h3>Follow RR Gems</h3>

            <div class="social-links">

                <a href="#" class="social-item">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="#" class="social-item">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="#" class="social-item">
                    <i class="fa-brands fa-youtube"></i>
                </a>

                <a href="#" class="social-item">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

                <a href="#" class="social-item">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>

                

            </div>

        </div>

    </div>
</section>

<style>
    .rr-social-bar{
        padding:60px 0 100px;
        background:#faf9f6;
    }

    .social-wrapper{
        background:#fff;
        border:1px solid rgba(196,138,44,.15);
        border-radius:24px;
        padding:25px 40px;
        display:flex;
        align-items:center;
        justify-content:space-between;
        box-shadow:0 10px 30px rgba(0,0,0,.04);
    }

    .social-wrapper h3{
        margin:0;
        font-size:24px;
        color:#111827;
        font-weight:700;
    }

    .social-links{
        display:flex;
        gap:15px;
    }

    .social-item{
        width:55px;
        height:55px;
        border-radius:16px;
        background:#faf7f2;
        color:#c48a2c;
        display:flex;
        align-items:center;
        justify-content:center;
        text-decoration:none;
        font-size:22px;
        transition:.3s;
    }

    .social-item:hover{
        background:#c48a2c;
        color:#fff;
        transform:translateY(-4px);
    }

    @media(max-width:768px){

    .social-wrapper{
        flex-direction:column;
        gap:20px;
        text-align:center;
        padding:25px;
    }

    .social-links{
        flex-wrap:wrap;
        justify-content:center;
    }

    }
</style>
 

 
</div>