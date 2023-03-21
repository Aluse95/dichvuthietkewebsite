<style>
  /* zalo, phone */
  #button-contact-vr {
    position: fixed;
    bottom: 0;
    z-index: 99999;
  }

  /*phone*/
  #button-contact-vr .button-contact {
    position: relative;
  }

  #button-contact-vr .button-contact .phone-vr {
    position: relative;
    visibility: visible;
    background-color: transparent;
    width: 90px;
    height: 90px;
    cursor: pointer;
    z-index: 11;
    -webkit-backface-visibility: hidden;
    -webkit-transform: translateZ(0);
    transition: visibility .5s;
    left: 0;
    bottom: 0;
    display: block;
  }

  .phone-vr-circle-fill {
    width: 65px;
    height: 65px;
    top: -80px;
    left: 12px;
    position: absolute;
    box-shadow: 0 0 0 0 #c31d1d;
    background-color: rgba(230, 8, 8, 0.7);
    border-radius: 50%;
    border: 2px solid transparent;
    -webkit-animation: phone-vr-circle-fill 2.3s infinite ease-in-out;
    animation: phone-vr-circle-fill 2.3s infinite ease-in-out;
    transition: all .5s;
    -webkit-transform-origin: 50% 50%;
    -ms-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    -webkit-animuiion: zoom 1.3s infinite;
    animation: zoom 1.3s infinite;
  }

  .phone-vr-img-circle {
    background-color: #e60808;
    width: 40px;
    height: 40px;
    line-height: 40px;
    top: -67px;
    left: 25px;
    position: absolute;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    -webkit-animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
    animation: phone-vr-circle-fill 1s infinite ease-in-out;
  }

  .phone-vr-img-circle a {
    display: block;
    line-height: 37px;
  }

  .phone-vr-img-circle img {
    max-width: 25px;
  }

  @-webkit-keyframes phone-vr-circle-fill {
    0% {
      -webkit-transform: rotate(0) scale(1) skew(1deg);
    }

    10% {
      -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
    }

    20% {
      -webkit-transform: rotate(25deg) scale(1) skew(1deg);
    }

    30% {
      -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
    }

    40% {
      -webkit-transform: rotate(25deg) scale(1) skew(1deg);
    }

    50% {
      -webkit-transform: rotate(0) scale(1) skew(1deg);
    }

    100% {
      -webkit-transform: rotate(0) scale(1) skew(1deg);
    }
  }

  @-webkit-keyframes zoom {
    0% {
      transform: scale(.9)
    }

    70% {
      transform: scale(1);
      box-shadow: 0 0 0 15px transparent
    }

    100% {
      transform: scale(.9);
      box-shadow: 0 0 0 0 transparent
    }
  }

  @keyframes  zoom {
    0% {
      transform: scale(.9)
    }

    70% {
      transform: scale(1);
      box-shadow: 0 0 0 15px transparent
    }

    100% {
      transform: scale(.9);
      box-shadow: 0 0 0 0 transparent
    }
  }

  .phone-bar a {
    position: fixed;
    bottom: 118px;
    left: 30px;
    z-index: -1;
    background: rgb(232, 58, 58);
    color: #fff;
    font-size: 16px;
    padding: 8px 15px 7px 50px;
    border-radius: 100px;
    white-space: nowrap;
  }

  .phone-bar a:hover {
    opacity: 0.8;
    color: #fff;
  }

  @media(max-width: 736px) {
    .phone-bar {
      display: none;
    }
  }

  #zalo-vr .phone-vr-circle-fill {
    box-shadow: 0 0 0 0 #2196F3;
    background-color: rgba(33, 150, 243, 0.7);
  }

  #zalo-vr .phone-vr-img-circle {
    background-color: #2196F3;
  }

  #viber-vr .phone-vr-circle-fill {
    box-shadow: 0 0 0 0 #714497;
    background-color: rgba(113, 68, 151, 0.8);
  }

  #viber-vr .phone-vr-img-circle {
    background-color: #714497;
  }

  #contact-vr .phone-vr-circle-fill {
    box-shadow: 0 0 0 0 #2196F3;
    background-color: rgba(33, 150, 243, 0.7);
  }

  #contact-vr .phone-vr-img-circle {
    background-color: #2196F3;
  }
</style>
<div id="button-contact-vr">
  <!-- contact -->
  <!-- end contact -->

  <!-- viber -->
  <!-- end viber -->
  <?php if(isset($web_information->social->zalo) && $web_information->social->zalo != ''): ?>
    <!-- zalo -->
    <div id="zalo-vr" class="button-contact">
      <div class="phone-vr">
        <div class="phone-vr-circle-fill"></div>
        <div class="phone-vr-img-circle">
          <a target="_blank" href="<?php echo e($web_information->social->zalo); ?>" rel="nofollow">
            <img src="<?php echo e(asset('images/zalo.png')); ?>" alt="Zalo" width="25" height="25" />
          </a>
        </div>
      </div>
    </div>
    <!-- end zalo -->
  <?php endif; ?>
  <?php if(isset($web_information->social->call_now) && $web_information->social->call_now != ''): ?>
    <!-- Phone -->
    <div id="phone-vr" class="button-contact">
      <div class="phone-vr">
        <div class="phone-vr-circle-fill"></div>
        <div class="phone-vr-img-circle">
          <a href="tel:<?php echo e($web_information->social->call_now); ?>" rel="nofollow">
            <img src="<?php echo e(asset('images/phone.png')); ?>" alt="Call now" width="25" height="25" />
          </a>
        </div>
      </div>
    </div>
    <div class="phone-bar">
      <a href="tel:<?php echo e($web_information->social->call_now); ?>" rel="nofollow">
        <span class="text-phone"><?php echo e($web_information->social->call_now); ?></span>
      </a>
    </div>

    <!-- end phone -->
  <?php endif; ?>
</div>

<div class="modal1 mfp-hide" id="modal-sign-up">
  <div class="button-close">
    <i class="fa-solid fa-xmark"></i>
  </div>
  <div class="card mx-auto" style="max-width: 540px">
    <div class="card-header py-3 bg-transparent center">
      <h3 class="text-center yellow-color mb-3">ĐĂNG KÍ <br> NHẬN KHUYẾN MÃI NGAY</h3>
      <p><i class="fa-solid fa-gift yellow-color"></i> Tặng <span class="yellow-color">1 tên miền </span>.com hoặc .net trị giá <span class="yellow-color">300K</span></p>
      <p><i class="fa-solid fa-gift yellow-color"></i> Tặng miễn phí <span class="yellow-color">1 năm </span>sử dụng hosting <span class="yellow-color">1Gb</span> trị giá <span class="yellow-color">1200K</span></p>
      <p><i class="fa-solid fa-gift yellow-color"></i> Tặng phần mềm <span class="yellow-color">live chat!</span></p>
      <h3 class="text-center yellow-color">HOTLINE: <?php echo e($web_information->social->call_now); ?> </h3>
    </div>
    <div class="card-body mx-auto " style="max-width: 70%">
      <form
        class="mb-0 row form_ajax"
        method="POST" action="<?php echo e(route('frontend.contact.store')); ?>"
      >
      <?php echo csrf_field(); ?>
      <input type="hidden" name="is_type" value="call_request">
        <div class="col-12">
          <input
            type="text"
            id="name"
            name="name"
            value="<?php echo e($user_auth->name ?? old('name')); ?>"
            class="form-control not-dark"
            placeholder="<?php echo app('translator')->get('Name'); ?>*"
            required
          />
        </div>
        <div class="col-12 mt-4">
          <input
            type="text"
            id="phone"
            name="phone"
            value="<?php echo e(old('phone')); ?>"
            class="form-control not-dark"
            placeholder="<?php echo app('translator')->get('Phone'); ?>*"
            required
          />
        </div>
        <div class="col-12 mt-4">
          <input
            type="email"
            id="email"
            name="email"
            value="<?php echo e(old('email')); ?>"
            class="form-control not-dark"
            placeholder="<?php echo app('translator')->get('Email'); ?>"
          />
        </div>
        <div class="col-12 mt-4">
          <textarea class="form-control " name="content" id="content" cols="30" rows="2" placeholder="Nhập ghi chú"></textarea>
        </div>

        <div class="col-12 mt-4">
          <button class="button w-100 m-0 py-2 mb-3 text-uppercase">
            <?php echo app('translator')->get('Register'); ?>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>




<?php /**PATH D:\xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/components/sticky/contact.blade.php ENDPATH**/ ?>