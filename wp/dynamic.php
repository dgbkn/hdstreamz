<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>DYNAMICX</title>
  <!-- MDB icon -->
  <link rel="icon" href="https://vegamovies.pages.dev/img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="https://vegamovies.pages.dev/css/mdb.min.css" />
</head>

<body>



  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand"><?php echo $_GET['name']; ?>
      .</a>

      <div class="input-group d-flex w-auto">
        <div class="form-outline">
          <input type="search" id="form1" class="form-control" />
          <label class="form-label" for="form1">Search</label>
        </div>
        <input type="submit" hidden />

        
        <button type="button" class="btn btn-primary" onclick="doSearch()">
          <i class="fas fa-search"></i>
        </button>
      </div>


    </div>
  </nav>



  <div class="d-flex justify-content-center" id="Loader">
    <div class="spinner-border m-5 text-primary" style="width: 3rem; height: 3rem;" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>







  <!-- Start your project here-->
  <div class="container row  w-auto" id="mainContent">

  </div>
  <!-- End your project here-->





  <!-- MDB -->
  <script type="text/javascript" src="https://vegamovies.pages.dev/js/mdb.min.js"></script>
  <script type="text/javascript">
    var url = new URL(window.location.href);
    var domain = url.searchParams.get("domain");
    var DISABLEMOREPAGE = url.searchParams.get("DISABLEMOREPAGE");



    function makeRequest(method, url) {
      return new Promise(function (resolve, reject) {
        let xhr = new XMLHttpRequest();
        xhr.open(method, url);
        xhr.onload = function () {
          if (this.status >= 200 && this.status < 300) {
            resolve({
              status: this.status,
              statusText: xhr.statusText,
              responseText: xhr.responseText
            });
          } else {
            reject({
              status: this.status,
              statusText: xhr.statusText
            });
          }
        };
        xhr.onerror = function () {
          reject({
            status: this.status,
            statusText: xhr.statusText
          });
        };
        xhr.send();
      });
    }

    function getWordStr(str) {
      return str.split(/\s+/).slice(0, 10).join(" ");
    }







    var baseUrl = "https://cors.spotifie.workers.dev/?";

    function getCategoryUri(catid){
        return(baseUrl + encodeURIComponent(domain + "/wp-json/wp/v2/posts?_embed&categories="+catid));
    }


    function getSearchurl(query){
        // return `${baseUrl + encodeURIComponent(`/wp-json/wp/v2/search?_embed&search=${query}&per_page=10`) }`;
      if (DISABLEMOREPAGE) {
        return `${baseUrl + encodeURIComponent(domain +`/wp-json/wp/v2/posts?_embed&search=${query}`) }`;
      }else{
              return `${baseUrl + encodeURIComponent(domain +`/wp-json/wp/v2/posts?_embed&search=${query}&per_page=40`) }`;
         }
    }

        if (DISABLEMOREPAGE) {
    var latestPosts = baseUrl + encodeURIComponent(domain +"/wp-json/wp/v2/posts?_embed=1");
    } else {
    var latestPosts = baseUrl + encodeURIComponent(domain +"/wp-json/wp/v2/posts?_embed=1&per_page=20");
    }

//     var baseUrl = "https://home.techiebank.workers.dev/http/";
//     var baseUrl = " https://proxy.goincop1.workers.dev/";
   

//     function getCategoryUri(catid) {
//       return (baseUrl + domain + "/wp-json/wp/v2/posts?_embed&categories=" + catid);
//     }


//     function getSearchurl(query) {
//       // return `${baseUrl + encodeURIComponent(`/wp-json/wp/v2/search?_embed&search=${query}&per_page=10`) }`;
//       if (DISABLEMOREPAGE) {
// //         return `${baseUrl + domain.replace("https://","https/").replace("http://","http/") + `/wp-json/wp/v2/posts?_embed&search=${query}`}`;
//         return `${baseUrl + domain + `/wp-json/wp/v2/posts?_embed&search=${query}`}`;
//       } else {
//         return `${baseUrl + domain + `/wp-json/wp/v2/posts?_embed&search=${query}&per_page=70`}`;
//       }
//     }

//     if (DISABLEMOREPAGE) {
//       var latestPosts = baseUrl + domain + "/wp-json/wp/v2/posts?_embed";
//     } else {
//       var latestPosts = baseUrl + domain + "/wp-json/wp/v2/posts?_embed&per_page=20";
//     }

// async function getLatestPosts(){
//     return makeRequest("GET", latestPosts);
// }



  </script>
  <!-- Custom scripts -->
  <script type="text/javascript">

    makeRequest("GET", latestPosts).then(response => {

      if (response.status == 200) {
        console.log(response.responseText);

        var obj = JSON.parse(response.responseText);

        console.log(obj);

        document.getElementById("Loader").style = "display:none!important";
        var res = "";

        obj.forEach((i) => {

          var content = i['content']['rendered'];
          
          // content = content.replace("https://i.imgur.com/", "https://thawning.tanishagoyal.repl.co/api?uri=https://i.imgur.com/");
          content = content.replaceAll('/download/?key=', 'https://flaskstreamer.lolhoinc.repl.co/olamov?key=');
          // content = content.replace('https://olamovies.site', 'https://thawning.tanishagoyal.repl.co/api?uri=https://olamovies.site');
const parser = new DOMParser();
                    var doc = parser.parseFromString(content, "text/html");
var a = doc.getElementsByTagName("img");

                         for (c = 0; c < a.length; c++) {
                           a[c].style.maxWidth = "100%";
                           a[c].style.height = "auto";
                         }
          
            doc.documentElement.style.width = "100%";
          content = doc.documentElement.innerHTML;
          
          if (Array.isArray(i["_embedded"]["wp:featuredmedia"])) {
            var img = i["_embedded"]["wp:featuredmedia"][0]["source_url"];
          }
          else {
            var img = "https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500";
          }


          // console.log(i);

          res = res + `
        
  
<!-- Modal -->
<div class="modal fade" id="modal${i.id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">${i['title']['rendered']}</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">${content}</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          
  <div class="col-lg-3 col-md-6 col-sm-12 ">
    <div class="card">
  <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
    <img src="${img}" class="img-fluid"/>
    <a href="#!">
      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
    </a>
  </div>
  <div class="card-body">
    <h5 class="card-title">${i['title']['rendered']}</h5>
    <button class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#modal${i.id}">OPEN</button>
  </div>
</div>
</div>
  `;

        });


        document.getElementById('mainContent').innerHTML = res;

      }


    });





    function doSearch() {

      if (document.getElementById('form1').value) {

        document.getElementById('mainContent').innerHTML = ``;

        document.getElementById("Loader").style = "";

        var url = getSearchurl(document.getElementById('form1').value);

        makeRequest("GET", url).then(response => {

          if (response.status == 200) {
            console.log(response.responseText);

            var obj = JSON.parse(response.responseText);

            console.log(obj);

            document.getElementById("Loader").style = "display:none!important";
            var res = "";

            obj.forEach((i) => {

              var content = i['content']['rendered'];
              content = content.replaceAll('/download/?key=', 'https://flaskstreamer.lolhoinc.repl.co/olamov?key=');

              if (Array.isArray(i["_embedded"]["wp:featuredmedia"])) {
                var img = i["_embedded"]["wp:featuredmedia"][0]["source_url"];
              }
              else {
                var img = "https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500";
              }
              const parser = new DOMParser();
                    var doc = parser.parseFromString(content, "text/html");
var a = doc.getElementsByTagName("img");

                         for (c = 0; c < a.length; c++) {
                           a[c].style.maxWidth = "100%";
                           a[c].style.height = "auto";
                         }
          
            doc.documentElement.style.width = "100%";
          content = doc.documentElement.innerHTML;

              // content = content.replace("https://i.imgur.com/", "https://thawning.tanishagoyal.repl.co/api?uri=https://i.imgur.com/");

              // console.log(i);

              res = res + `
  
<!-- Modal -->
<div class="modal fade" id="modal${i.id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
<div class="modal-content bg-dark text-white">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">${i['title']['rendered']}</h5>
  <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">${content}</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
    
<div class="col-lg-3 col-md-6 col-sm-12 ">
<div class="card">
<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
<img src="${img}" class="img-fluid"/>
<a href="#!">
<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
</a>
</div>
<div class="card-body">
<h5 class="card-title">${i['title']['rendered']}</h5>
<button class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#modal${i.id}">OPEN</button>
</div>
</div>
</div>
`;

            });


            document.getElementById('mainContent').innerHTML = res;

          }


        });



      }
    }



  </script>
</body>

</html>