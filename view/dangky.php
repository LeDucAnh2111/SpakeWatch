
<style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat:400,800");

    * {
      box-sizing: border-box;
    }

    body {
     
      /* display: flex; */
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-family: "Montserrat", sans-serif;
      height: 100vh;
      margin: -20px 0 50px;
    }

    h1 {
      font-weight: bold;
      margin: 0;
    }

    h2 {
      text-align: center;
    }

    p {
      font-size: 14px;
      font-weight: 100;
      line-height: 20px;
      letter-spacing: 0.5px;
      margin: 20px 0 30px;
    }

    span {
      font-size: 12px;
    }

    a {
      color: #333;
      font-size: 14px;
      text-decoration: none;
      margin: 15px 0;
    }

    button {
      border-radius: 20px;
      border: 1px solid #ff4b2b;
      background-color: #ff4b2b;
      color: #ffffff;
      font-size: 12px;
      font-weight: bold;
      padding: 12px 45px;
      letter-spacing: 1px;
      text-transform: uppercase;
      transition: transform 80ms ease-in;
    }

    button:active {
      transform: scale(0.95);
    }

    button:focus {
      outline: none;
    }

    button.ghost {
      background-color: transparent;
      border-color: #ffffff;
    }

    form {
      background-color: #fafafa;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 50px;
      height: 100%;
      text-align: center;
    }

    input {
      background-color: #eee;
      border: none;
      padding: 12px 15px;
      margin: 8px 0;
      width: 100%;
    }

    .container1 {
      background-color: #fff;
      border-radius: 10px;
      position: relative;
      overflow: hidden;
      width: 768px;
      max-width: 100%;
      min-height: 480px;
    }

    .form-container1 {
      position: absolute;
      top: 0;
      height: 100%;
      transition: all 0.6s ease-in-out;
    }

    .sign-in-container1 {
      left: 0;
      width: 50%;
      z-index: 2;
    }

    .container1.right-panel-active .sign-in-container1 {
      transform: translateX(100%);
    }

    .sign-up-container1 {
      left: 0;
      width: 50%;
      opacity: 0;
      z-index: 1;
    }

    .container1.right-panel-active .sign-up-container1 {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: show 0.6s;
    }

    @keyframes show {

      0%,
      49.99% {
        opacity: 0;
        z-index: 1;
      }

      50%,
      100% {
        opacity: 1;
        z-index: 5;
      }
    }

    .overlay-container1 {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: transform 0.6s ease-in-out;
      z-index: 100;
    }

    .container1.right-panel-active .overlay-container1 {
      transform: translateX(-100%);
    }

    .overlay {
      background: #ff416c;
      background: -webkit-linear-gradient(to right, #ff4b2b, #ff416c);
      background: linear-gradient(to right, #ff4b2b, #ff416c);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: 0 0;
      color: #ffffff;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .container1.right-panel-active .overlay {
      transform: translateX(50%);
    }

    .overlay-panel {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 40px;
      text-align: center;
      top: 0;
      height: 100%;
      width: 50%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
      transform: translateX(-20%);
    }

    .container1.right-panel-active .overlay-left {
      transform: translateX(0);
    }

    .overlay-right {
      right: 0;
      transform: translateX(0);
    }

    .container1.right-panel-active .overlay-right {
      transform: translateX(20%);
    }

    .social-container1 {
      margin: 20px 0;
    }

    .social-container1 a {
      border: 1px solid #dddddd;
      border-radius: 50%;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 0 5px;
      height: 40px;
      width: 40px;
    }
  </style>
<div class="container">
    <div class="row justify-content-center">
      <div class="container1" id="container">
        <!-- <div class="form-container1 sign-up-container1"> -->
          <form action="index.php?pg=adduser" method="post" id="dangky">
            <h1>Tạo tài khoản</h1>
            <div class="text-danger h5"><?php echo $loi ?></div>
            <div class="social-container1">
              <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
              <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>hoặc sử dụng email của bạn để đăng ký</span>
            <input type="text" id="tk" name="tk" placeholder="Tên tài khoản" />
            <input type="email" id="email" name="email" placeholder="Email" />
            <input type="password" id="mk" name="mk" placeholder="Mật khẩu"  />
            <span class="eye">
              <!-- <i class="fa-solid fa-eye"></i> -->
            <i class="fa-regular fa-eye"></i>
          </span>
            <button type="submit" name="dangky">Đăng kí</button>
            <div class="errorDk"></div>
          </form>
        <!-- </div> -->
        <!-- <div class="form-container1 sign-in-container1"> -->
          <!-- <form action="index.php?pg=login" id="dangnhap">
            <h1>Đăng nhập</h1>
            <div class="social-container1">
              <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
              <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>hoặc sử dụng tài khoản của bạn</span>
            <input type="email" id="emaildangnhap" placeholder="Email" />
            <input type="password" id="mkdangnhap" placeholder="Mật khẩu" />
            <a href="#">Quên mật khẩu?</a>
            <button>Đăng nhập</button>
            <div class="errorDn"></div>
          </form> -->
        <!-- </div> -->
        <!-- <div class="overlay-container1">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1>Chào mừng trở lại!</h1>
              <p>
                Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn
              </p>
              <button class="ghost" id="signIn">Đăng nhập</button>
            </div>
            <div class="overlay-panel overlay-right">
              <h1>Chào bạn!</h1>
              <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
              <button class="ghost" id="signUp">Sign Up</button>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <!-- <script src="layout-v2/layout/js/login.js"></script> -->