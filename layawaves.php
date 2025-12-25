<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laya Waves | Kalkudah</title>
   <link rel="icon" href="layawavesimages/logo.jfif" type="image/x-icon"> <!-- Link to your icon file -->
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   
   <!-- swiper js cdn link -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
 
<!-- Bootstrap CSS Version 2 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- custom css link -->
   <link rel="stylesheet" href="layawaves.css">
   

   

</head>
<body>


   <header class="header">

      <a  class="logo">&nbsp;Laya Waves  </a>

      <nav class="navbar">
         <a href="index.php">home</a>
         <a href="index.php #aboutus">about</a>
         <a href="#room">rooms</a>
         <a href="#gallery">gallery</a>
         <a href="#Promo">Promo</a>
         <a href="#contact">Contact</a>
         <a href="layawavesrooms.php" class="btn" > Book Now &nbsp;    </a>
             
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </header>

   <!-- end -->

   <!-- home -->

   <?php
include 'db_connect.php';
$result = $conn->query("SELECT video_path FROM wavesvideos ORDER BY id DESC LIMIT 1");
$row = $result->fetch_assoc();
$videoPath = $row['video_path'];
?>

<section class="home">
    <div class="slide">
        <video autoplay muted loop>
            <source src="<?php echo $videoPath; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</section>

   <!-- end -->

   <!-- availability -->

   <section class="availability">
    <form action="">
        <div class="box">
            <p>Check-in <span>*</span></p>
            <input type="date" class="input" id="checkin_date" min="<?php echo date('Y-m-d'); ?>" required>
        </div>
        <div class="box">
            <p>Check-out <span>*</span></p>
            <input type="date" class="input" id="checkout_date" min="<?php echo date('Y-m-d'); ?>" required>
        </div>
    </form>
    <a href="book.php" class="btn">Book Now</a>
</section>


   
   <!-- room -->

   <section class="room" id="room">
    <h1 class="heading">Rooms</h1>
    <div class="swiper room-slider">
        <div class="swiper-wrapper">
            <?php
            require_once 'db_connect.php';

            $sql = "SELECT * FROM wavesrooms";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="swiper-slide slide">';
                    echo '<div class="image">';
                    echo '<img src="' . $row['image'] . '" alt="' . $row['title'] . '" style="max-width: 100%; height: 180px;">'; // Adjust style for image size
                    echo '</div>';
                    echo '<div class="content">';
                    echo '<h3>' . $row['title'] . '</h3>';
                    echo '<p>' . $row['description'] . '</p>';
                    echo '<a href="layawavesrooms.php" class="btn">Book Now</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

   <!-- end -->

   <!-- services -->

   <?php
include 'db_connect.php';

$sql = "SELECT * FROM wavesservices";
$result = $conn->query($sql);
?>

<section class="services">
    <div class="box-container">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="box">
                <img src="<?php echo $row['image_url']; ?>" alt="">
                <h3><?php echo $row['description']; ?></h3>
            </div>
        <?php } ?>
    </div>
</section>

<?php
$conn->close();
?>

   <!-- end -->

   <!-- gallery -->

   <?php
include 'db_connect.php'; // Include your database connection script

// Fetch all images
$sql = "SELECT * FROM wavesgallery";
$result = $conn->query($sql);
?>

<section class="gallery" id="gallery">
    <h1 class="heading">our gallery</h1>
    <div class="swiper gallery-slider">
        <div class="swiper-wrapper">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="swiper-slide slide">
                    <img src="<?php echo $row['image_url']; ?>" alt="Gallery Image">
                    <div class="icon">
                        <i class="fas fa-magnifying-glass-plus"></i>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php $conn->close(); ?>


<!-- promotion -->
<section class="Promo" id="Promo">
    <h1 class="heading">Promo</h1>
    <div class="slider">
        <?php
        // Include your database connection script
        include 'db_connect.php';

        // Fetch images from the database
        $sql = "SELECT image_url FROM wavespromo ORDER BY id ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $image_url = $row['image_url'];
                echo '<span style="--i:' . $i . ';"><img src="' . $image_url . '" class="promo-img" onclick="openModal(this.src)"></span>';
                $i++;
            }
        } else {
            echo '<p>No images found</p>';
        }

        // Close database connection
        $conn->close();
        ?>
    </div>
</section>

<!-- Modal Structure -->
<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImage">
</div>

<!-- promotion -->


   <!-- end -->
<section class="contact" id="contact">
   <div class="contact-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="section-title">
                    <h1 class="heading">Contact Us</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="contact-form">
               <form method="post" action="layawavescontactus.php">
               <div class="form-group">
								<input class="form-control" placeholder="Your Name Here" type="text" name="user">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Your Email Here" type="email" name="email">
							</div>
							<div class="form-group">
								<textarea class="form-control" cols="30" placeholder="Your Message" name="message" rows="10"></textarea>
							</div><button class="btn" type="submit">Submit</button>
						</form>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="map-area">
               <iframe allowfullscreen src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1013115.9071859759!2d80.08449902996836!3d7.299390409918574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afad9079cad7131%3A0xcc37a5053dbea4d8!2sLaya%20Waves!5e0!3m2!1sen!2slk!4v1720041060328!5m2!1sen!2slk"></iframe>
					</div>
				</div>
			
		</div>
	</div>
                  </section>
    
    


                  <div class="spacer"></div> <!-- This div creates space -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>contact info</h3>
         <a href=""> <i class="fas fa-phone"></i> +94-652050500</a>
         <a href=""> <i class="fas fa-phone"></i> +94-771605562</a>
         <a href=""> <i class="fas fa-envelope"></i>layawaves@gmail.com</a>
         <a href="https://maps.app.goo.gl/S2urRDRtaVenmjo3A"> <i class="fas fa-map"></i>Laya Waves,Kalkudah,Sri Lanka</a>
      </div>

      <div class="box">
         <h3>quick links</h3>
         <a href="index.php #aboutus"> <i class="fas fa-arrow-right"></i> about</a>
         <a href="#room"> <i class="fas fa-arrow-right"></i> rooms</a>
         <a href="#gallery"> <i class="fas fa-arrow-right"></i> gallery</a>
         <a href="layawavesrooms.php"> <i class="fas fa-arrow-right"></i> reservation</a>
         <a href="#Promo"> <i class="fas fa-arrow-right"></i> hotel deals</a>
         
      </div>
      <img src="layawavesimages/logofooter.jpg" alt="Company Logo" class="f1"> 
      
   </div>
   
   <div class="share">
      <a href="https://www.facebook.com/layawaveshotel/" class="fab fa-facebook-f"></a>
      <a href="https://www.instagram.com/explore/locations/961244785/laya-waves/" class="fab fa-instagram"></a>
      <a href="https://youtube.com/@layahotels214?si=9PD28opMHRfxpyHg" class="fab fa-youtube"></a>
      <a href="https://api.whatsapp.com/send/?phone=94771605562&text&type=phone_number&app_absent=0" class="fab fa-whatsapp"></a>
   </div>

   <div class="credit">&copy; 2024 Copyright: <span>Laya Hotels</span></div>

</section>

   
















   <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

   <script src="script.js"></script>

</body>
</html>