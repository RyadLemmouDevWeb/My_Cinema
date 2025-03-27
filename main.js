function nuit() {
    document.body.classList.toggle("nuit");
}

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}


const sliders = document.querySelector(".carouselbox");
let scrollPerClick;
const ImagePadding = 30;

async function showMoviedata() {
  
    const api_key = "b00a7c6b3f5c2558ba9a49b7d3af822f";
    const response = await axios.get(
      `https://api.themoviedb.org/3/discover/movie?api_key=${api_key}&include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc`
    );

    const movies = response.data.results;
    console.log(movies);

    movies.map(function (cur, index) {
      if (cur.poster_path) {
        sliders.insertAdjacentHTML(
          "beforeend",
          `<img class="img-${index} slider-img" src="https://image.tmdb.org/t/p/w185/${cur.poster_path}" alt="${cur.title}"/>`
        );
      }
    });

    const firstImage = document.querySelector(".img-1");
    if (firstImage) {
      scrollPerClick = firstImage.clientWidth + ImagePadding;
    }

}

showMoviedata();


const sliders2 = document.querySelector("#carouselbox2");
let scrollPerClick2;
const ImagePadding2 = 30;

async function showMovie(){
  const api_key = "b00a7c6b3f5c2558ba9a49b7d3af822f";
  const response = await axios.get(
    `https://api.themoviedb.org/3/discover/movie?api_key=${api_key}&include_adult=false&include_video=false&language=en-US&page=65&sort_by=primary_release_date.desc`
  );

  const movies2 = response.data.results;
  console.log(movies2);

  movies2.map(function (cur, index) {
    if (cur.poster_path) {
      sliders2.insertAdjacentHTML(
        "beforeend",
        `<img class="img-${index} slider-img" src="https://image.tmdb.org/t/p/w185/${cur.poster_path}" alt="${cur.title}"/>`
      );
    }
  });

  const secondImage = document.querySelector(".img-2");
  if (secondImage) {
    scrollPerClick2 = secondImage.clientWidth + ImagePadding2;
  }
}

showMovie();





