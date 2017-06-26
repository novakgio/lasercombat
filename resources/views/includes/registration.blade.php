 <div id="overlay">
                <div class="close-overlay">
                    <i class="ion-close-round close-icon"></i>
                </div>
                <div class="reserve-popup" id="reservepopup">
                    <h3 class="succes-h3">დაჯავშნა წარმატებით შესრულდა</h3>
                    <input type="hidden" id="orderid" value="">
                    <p class="under-h3 long-copy">თქვენ იყიდეთ პირველი თანხა რაც წერია იმ ფასად ! პირველი ღილაკი (იყიდე ეხლავე და 10 ლარი მოაკელით თქვენს გადასახადს) ! ღილაკი მეორე (იყიდეთ და მოაკელით სრული თანხის 10%</p>
                    <p class="under-h3">დაჯავშნის ფასი: <span class="price-box" id="reserve-price">300 GEL</span></p>
                   
                    <div class="row partial-container-second modify-container">
                        <span class="price-first-mine" id="price-box-sale1">300 GEL</span>
                        <span class="price-second-mine" id="price-box-sale2">300 GEL</span> 
                    </div>
                    <div class="row partial-container-second">
                        <button class="button-second" id="buybutton">იყიდე</button>
                        <button class="button-third" id="buybutton">იყიდე</button>
                    </div>
                </div>

                <!-- price-box-sale2 price-box-sale1 -->
                
                <div class="registration-chooser" id="registration-chooser">
                    <div class="row">
                        <h3 class="header-third">Choose Login Form</h3>
                    </div>
                    <div class="row butons-container">
                        <div class="row button-container">
                           
                            <div class="button-login facebook-button" id="logfacebook">

                            Login With Facebook

                                     
                            </div>


                        </div>
                        <div class="row button-container">
                            <div class="button-login account-button" id="login-with-account">Login With Account</div>
                        </div>
                    </div>
                </div>
                <div class="login-form" id="login-form">
                    <div class="row">
                        <h3 class="header-third">Log In</h3>
                    </div>
                    <div class="row butons-container">
                        <div class="row button-container">
                            <input type="email" id="logemail" placeholder="Email" class="big-input">
                        </div>
                        <div class="row button-container">
                            <input type="password" id="logpassword" placeholder="Password" class="big-input">
                        </div>
                        <div class="row button-container">
                            <div class="button-login account-button" id="loginuser">Log In</div>
                        </div>
                        <div class="row button-container">
                            <div class="button-login account-button" id="create-account">Create Account</div>
                        </div>
                    </div>
                </div>
                <div class="create-account-form" id="create-account-form">
                 
                    <div class="row">
                        <h3 class="header-third">Create Account</h3>
                    </div>
                    <div class="row butons-container">
                        <div class="row button-container">
                            <input type="text" id="username" placeholder="Name" class="big-input">
                        </div>
                        <div class="row button-container">
                            <input type="email" id = "email" placeholder="Email" class="big-input">
                        </div>
                        <div class="row button-container">
                            <input type="text" id="phone" placeholder="Phone Number" class="big-input">
                        </div>
                        <div class="row button-container">
                            <input type="password" id="password" placeholder="Password" class="big-input">
                        </div>
                        <div class="row button-container">
                            <input type="password" id="confirmpass" placeholder="Confirm Password" class="big-input">
                        </div>
                        <div class="row" id="errors" style="display:none">
                            <p id="error"></p>
                        </div>
                        <div class="row button-container">
                            <div class="button-login account-button" id="createaccount">Create Account</div>
                        </div>
                    </div>
                   
                </div>
              

            