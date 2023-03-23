<?php 
    $page = basename($_SERVER['PHP_SELF']);
    echo $page;
?>

<nav class="navbar navbar-expand-lg navbar-dark cyan fixed-top">
      <div class="container">
      <div id="nav-logo">
        <a class="navbar-brand" href="index.php">
        
          <img src="images/k-moments.png" class="nav-logo"alt="nav-logo" />
          
        </a>
        
        </div>
       
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent-4"
          aria-controls="navbarSupportedContent-4"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
          
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php if($page == 'index.php'){ echo ' active';}?>">
              <a class="nav-link" href="index.php"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item <?php if($page == 'about.php'){ echo ' active';}?>">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item <?php if($page == 'gallery.php'){ echo ' active';}?>">
              <a class="nav-link" href="gallery.php">gallery </a>
            </li>
            <li class="nav-item <?php if($page == 'blog.php'){ echo ' active';}?>">
              <a class="nav-link" href="blog.php">Read my blog </a>
            </li>
            <li class="nav-item <?php if($page == 'contact.php'){ echo ' active';}?>">
              <a class="nav-link" href="contact.php">contact </a>
            </li>
          </ul>

                  

        </div>
        
      </div>
    </nav>
   