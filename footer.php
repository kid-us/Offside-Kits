<?php

// if (isset($_SESSION['feed-msg'])){
//   echo '<script src="JS/sweetalert2.all.min.js"></script>';
//   echo "<script>document.addEventListener('DOMContentLoaded', function(e) {Swal.fire({
//       position: 'center',
//       title: 'Thank you for the feedback',
//       color: 'green',
//       showConfirmButton: false,
//       timer: 2500,
//     })
//   })</script>";
// }
// unset($_SESSION['feed-msg']);
// ?>

<footer class="bg-light pb-3">
  <div class="container pt-5">
    <div class="row small fw-semibold">
      <div class="col-lg-4 col-md-6 col-sm-6 mt-5 ">
        <img src="Img/logo.png" alt="Our store Logo" width="200px">
        <p class="font-italic mt-5">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut vitae
          repellat doloribus aut laudantium? Nesciunt, voluptas ut
          temporibus corporis quas laborum id.
        </p>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-3 ps-5">
        <ul class="mt-5 ">
          <li class="list">
            <a class="text-decoration pb-2" id="about-us" href="#"> About Us</a>
          </li>
          <li class="list">
            <a class="text-decoration" href="#" id="contact-us" class="py-5"> Contact Us</a>
          </li>
          <li class="list">
            <a class="text-decoration" href="#" id="privacy"> Privacy & Policy</a>
          </li>
          <li class="list">
            <a class="text-decoration" href="#" id="term"> Term & Use</a>
          </li>
        </ul>
      </div>


      <div class="col-lg-4 col-md-12 col-sm-12 mt-4 mb-5">
        <form id="feedback-form" method="POST">
          <label for="email" class="col-form-label">Email</label>
          <input id="feedback-email" type="email" name="email" class="form-control" />
          <!-- <p class="text-center text-danger" id="email-msg"></p> -->
          <label for="feedback" class="col-form-label">Message</label>
          <textarea name="message" class="form-control mt-2" id="message" cols="2" rows="3" placeholder="Message"
            style="resize: none"></textarea>

          <p class="text-center text-danger" id="feed-msg"></p>

          <button type="submit" id="feedback-submit" name="submit" class="rounded w-50 btn btn-danger mt-2">
            Submit
          </button>
        </form>
      </div>
    </div>
    <p class="text-center small fw-semibold">&copy; 2022 -
      <?php echo date("Y") ?> <span id="date"></span>
    </p>
    <p class="small text-center fw-semibold">Developed By Kidus</p>
  </div>
</footer>
