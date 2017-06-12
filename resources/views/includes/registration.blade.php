 <div id="overlay">
                <div class="close-overlay">
                    <i class="ion-close-round close-icon"></i>
                </div>
                
                <div class="registration-chooser" id="registration-chooser">
                    <div class="row">
                        <h3 class="header-third">Choose Login Form</h3>
                    </div>
                    <div class="row butons-container">
                        <div class="row button-container">
                            <div class="button-login facebook-button">Login With Facebook</div>
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
                            <input type="text" id="logemail" placeholder="Email" class="big-input">
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
                 {{ csrf_field() }}
                    <div class="row">
                        <h3 class="header-third">Create Account</h3>
                    </div>
                    <div class="row butons-container">
                        <div class="row button-container">
                            <input type="text" id="username" placeholder="Username" class="big-input">
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
            </div>