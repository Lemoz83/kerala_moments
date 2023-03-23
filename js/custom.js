// ===== Scroll to Top ====
$(window).scroll(function () {
  if ($(this).scrollTop() >= 50) {
    // If page is scrolled more than 50px
    $("#return-to-top").fadeIn(200); // Fade in the arrow
  } else {
    $("#return-to-top").fadeOut(200); // Else fade out the arrow
  }
});
$("#return-to-top").click(function () {
  // When arrow is clicked

  $("body, html").animate(
    {
      scrollTop: 0, // Scroll to top of body
    },
    500
  );
});

// --- show view counter of clicked images------

// const image = [...document.getElementsByClassName("portfolio-image")];
// const imageCount = [...document.getElementsByClassName("count")];

// let sum = 0;

// image.forEach((img) =>
//   img.addEventListener("click", function () {
//     sum = sum + 1;
//     for (let i = 0; i < imageCount.length; i++) {
//       console.log((imageCount[i].innerHTML = sum));
//     }
//   })
// );

const portfolioImage = document.querySelectorAll(".portfolio");
const imageCount = document.querySelectorAll(".count");

let sum = 0;

for (let i = 0; i < portfolioImage.length; i++) {
  portfolioImage[i].addEventListener("click", function () {
    if (typeof Storage !== "undefined") {
      if (localStorage.clickcount) {
        localStorage.clickcount = Number(localStorage.clickcount) + 1;
      } else {
        localStorage.clickcount = 1;
      }
      imageCount[i].innerHTML = localStorage.clickcount;
    }
  });
}

// portfolioImage.addEventListener("click", function () {
//   sum = sum + 1;
//   for (let i = 0; i < portfolioImage.length; i++) {
//     if (portfolioImage[i] === imageCount[i]) {
//       // return true;
//       imageCount[i].innerHTML = sum;
//     }
//   }
// });

//confirm box for broucher download------

// const downloadModal = document.getElementById("download");
// const downloadFile = document.getElementById("download-file");

// downloadModal.addEventListener("click", function () {
//   if (confirm("press ok to download the file") === true) {
//     downloadFile.setAttribute(
//       "href",
//       "<?php echo "admin/upload/ ".$rows['br-link'];?>"
//     );
//     downloadFile.setAttribute("download", "keralamoments.pdf");
//     location.reload("");
//   }
// });

function newDoc() {
  window.location.assign("http://localhost/keralamoments/about.php");
}
