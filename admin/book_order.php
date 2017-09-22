<html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>UIU Book Exchange</title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/patros.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
</head>


<body data-spy="scroll">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.html"><img src="../images/uiulogo.png" alt="company logo" /></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right custom-menu">
                        <li ><a href="admin_home.php">Home</a></li>
                        <li ><a href="admin_user_list.php">User list</a></li>
                        <li ><a href="admin_book_list.php">List of Books</a></li>
                        <li><a href="update_db.php">Update Database</a></li>
                        <li class="active"><a href="book_order.php">Recent Orders</a></li>
                        <!-- <li><a href="#portfolio1">Portofolio</a></li> -->
                        
                        
                        <li><a href="../logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <section>
        <div class="row">
            <div>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </section>
    <section class="container blog">
        <
        <!-- <div id="table_div"> -->
        <div id="book">

            <?php
                include("../connect.php"); 
                 function highlightkeyword($str, $search) {
                    $highlightcolor = "#daa732";
                    $occurrences = substr_count(strtolower($str), strtolower($search));
                    $newstring = $str;
                    $match = array();
 
                    for ($i=0;$i<$occurrences;$i++) {
                        $match[$i] = stripos($str, $search, $i);
                        $match[$i] = substr($str, $match[$i], strlen($search));
                        $newstring = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($newstring));
                    }
                
 
                $newstring = str_replace('[#]', '<span style="color: '.$highlightcolor.';">', $newstring);
                $newstring = str_replace('[@]', '</span>', $newstring);
                return $newstring;
                }
 
                
                // search by name
                if(isset($_POST['name_search']) && $_POST['user_input'] != ""){
                    
                    $key = $_POST['user_input'];
                $query="SELECT * FROM book where title like '%$key%' or ISBN like '%$key%' or quantity like '%$key%' or price like '%$key%' or status like '%$key%' or edition like '%$key%' or owner_id like '%$key%' or time like '%$key%'";

                $result = $conn->query($query);

                
                $row = mysqli_fetch_assoc($result);
                if($row == null) {
                echo "<p><b> No Match Found </b></p>";
                }
                else{
                //echo "Registered. :) ";    
                echo "<table >
                <tr>
                    <th> Book ID </th>

                     <th>&nbsp;&nbsp;</th> 

                    <th> time </th>
                    <th>&nbsp;&nbsp;</th>              
                    <th> Title </th>
                    <th>&nbsp;&nbsp;</th>             
                    <th> ISBN </th>
                    <th>&nbsp;&nbsp;</th>            
                    <th> Quantity </th>
                    <th>&nbsp;&nbsp;</th>
                    <th> Price </th>
                    <th>&nbsp;&nbsp;</th>              
                    <th> Status </th>
                    <th>&nbsp;&nbsp;</th>             
                    <th> Edition </th>
                    <th>&nbsp;&nbsp;</th>
                    <th> Owner ID </th>
                   
                                

                    
                    
                </tr>";

                while($row != NULL){
                    $book_id = $row['id'];
                    echo "<tr><td>";
                    echo highlightkeyword($book_id, $key);
                    echo "</td>";

                      echo"<th>&nbsp;&nbsp;</th>";
                    $time = $row['time'];
                    echo"<td>";
                    echo highlightkeyword($time, $key);
                    echo "</td></tr>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $title = $row['title'];
                    echo"<td>";
                    echo highlightkeyword($title, $key);
                    echo "</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $ISBN = $row['ISBN'];
                    echo"<td>";
                    echo highlightkeyword($ISBN, $key);
                    echo "</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $quantity = $row['quantity'];
                    echo"<td>";
                    echo highlightkeyword($quantity, $key);
                    echo "</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $price = $row['price'];
                    echo"<td>";
                    echo highlightkeyword($price, $key);
                    echo "</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $status = $row['status'];
                    echo"<td>";

                    echo highlightkeyword($status, $key);
                    echo "</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $edition = $row['edition'];
                    echo"<td>";
                    echo highlightkeyword($edition, $key);
                    echo "</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    
                    $owner_id = $row['owner_id'];
                    echo"<td>";
                    echo highlightkeyword($owner_id, $key);
                    echo "</td></tr>";
                   
                    //echo"<br>";
                    $row = mysqli_fetch_assoc($result);
                }
            }
            
            }
            $conn = null;

            
            ?>

                </table>
                <!-- </div> -->
        </div>

        <br>
        <br>
        <br>
        <div id="book">
            <table>
                <tr>
                    <th> Book ID </th>
                    <th>&nbsp;&nbsp;</th>

                    <th> time </th>
                    <th>&nbsp;&nbsp;</th>
                    <th> Title </th>
                    <th>&nbsp;&nbsp;</th>
                    <th> ISBN </th>
                    <th>&nbsp;&nbsp;</th>
                    <th> Quantity </th>
                    <th>&nbsp;&nbsp;</th>
                    <th> Price </th>
                    <th>&nbsp;&nbsp;</th>
                    <th> Status </th>
                    <th>&nbsp;&nbsp;</th>
                    <th> Edition </th>
                    <th>&nbsp;&nbsp;</th>
                    
                    

                    <th> Owner ID </th>
                    
                </tr>

                <?php
                    
                    include("../connect.php"); 
                    $query = "SELECT * FROM book";
                    $result = $conn->query($query);
                    $row = mysqli_fetch_assoc($result);
                    if(isset($_POST['user'])){

                    }
                    while($row != NULL){
                    $book_id = $row['id'];
                    echo "<tr><td>$book_id</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $time = $row['time'];
                    echo"<td>$time</td>";
                    echo"<th>&nbsp;&nbsp;</th>";

                    $title = $row['title'];
                    echo"<td>$title</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $ISBN = $row['ISBN'];
                    echo"<td>$ISBN</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $quantity = $row['quantity'];
                    echo"<td>$quantity</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $price = $row['price'];
                    echo"<td>$price</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $status = $row['status'];
                    echo"<td>$status</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $edition = $row['edition'];
                    echo"<td>$edition</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                   
                    $owner_id = $row['owner_id'];
                    echo"<td>$owner_id</td></tr>";
                    

                    
                    //echo"<br>";
                    $row = mysqli_fetch_assoc($result);
                }
                ?>
            </table>
        </div>
        </div>
        </div>
    </section>
    <section id="follow-us">
        <div class="container">
            <div class="text-center height-contact-element">
                <h2>FOLLOW US</h2>
            </div>
            <img class="img-responsive displayed" src="../images/short.png" alt="short" />
            <div class="text-center height-contact-element">
                <ul class="list-unstyled list-inline list-social-icons">
                    <li class="active"><a href="#"><i class="fa fa-facebook social-icons"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter social-icons"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus social-icons"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin social-icons"></i></a></li>
                </ul>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <div class="row myfooter">
                <div class="col-sm-6">
                    <div class="pull-left">
                        © Copyright Company 2015 | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="pull-right">Designed by <a href="http://www.atis.al">ATIS</a></div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Google Map -->
    <script src="//maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=true&amp;libraries=places"></script>

    <!-- Portfolio -->
    <script src="../js/jquery.quicksand.js"></script>


    <!--Jquery Smooth Scrolling-->
    <script>
        $(document).ready(function() {
            $('.custom-menu a[href^="#"], .intro-scroller .inner-link').on('click', function(e) {
                e.preventDefault();

                var target = this.hash;
                var $target = $(target);

                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top
                }, 900, 'swing', function() {
                    window.location.hash = target;
                });
            });

            $('a.page-scroll').bind('click', function(event) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top
                }, 1500, 'easeInOutExpo');
                event.preventDefault();
            });

            $(".nav a").on("click", function() {
                $(".nav").find(".active").removeClass("active");
                $(this).parent().addClass("active");
            });

            $('body').append('<div id="toTop" class="btn btn-primary color1"><span class="glyphicon glyphicon-chevron-up"></span></div>');
            $(window).scroll(function() {
                if ($(this).scrollTop() != 0) {
                    $('#toTop').fadeIn();
                } else {
                    $('#toTop').fadeOut();
                }
            });
            $('#toTop').click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 700);
                return false;
            });

        });
    </script>

    <script>
        function gallery() {};

        var $itemsHolder = $('ul.port2');
        var $itemsClone = $itemsHolder.clone();
        var $filterClass = "";
        $('ul.filter li').click(function(e) {
            e.preventDefault();
            $filterClass = $(this).attr('data-value');
            if ($filterClass == 'all') {
                var $filters = $itemsClone.find('li');
            } else {
                var $filters = $itemsClone.find('li[data-type=' + $filterClass + ']');
            }
            $itemsHolder.quicksand(
                $filters, {
                    duration: 1000
                },
                gallery
            );
        });

        $(document).ready(gallery);
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            inicializemap()

            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();

                // get values from FORM
                var name = $("#name").val();
                var email = $("#email").val();
                var message = $("#message").val();
                var goodToGo = false;
                var messgaeError = 'Request can not be send';
                var pattern = new RegExp(/^(('[\w-\s]+')|([\w-]+(?:\.[\w-]+)*)|('[\w-\s]+')([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);


                if (name && name.length > 0 && $.trim(name) != '' && message && message.length > 0 && $.trim(message) != '' && email && email.length > 0 && $.trim(email) != '') {
                    if (pattern.test(email)) {
                        goodToGo = true;
                    } else {
                        messgaeError = 'Please check your email address';
                        goodToGo = false;
                    }
                } else {
                    messgaeError = 'You must fill all the form fields to proceed!';
                    goodToGo = false;
                }


                if (goodToGo) {
                    $.ajax({
                        data: $('#contactForm').serialize(),
                        beforeSend: function() {
                            $('#success').html('<div class="col-md-12 text-center"><img src="images/spinner1.gif" alt="spinner" /></div>');
                        },
                        success: function(response) {
                            if (response == 1) {
                                $('#success').html('<div class="col-md-12 text-center">Your email was sent successfully</div>');
                                window.location.reload();
                            } else {
                                $('#success').html('<div class="col-md-12 text-center">E-mail was not sent. Please try again!</div>');
                            }
                        },
                        error: function(e) {
                            $('#success').html('<div class="col-md-12 text-center">We could not fetch the data from the server. Please try again!</div>');
                        },
                        complete: function(done) {
                            console.log('Finished');
                        },
                        type: 'POST',
                        url: '../js/send_email.php',
                    });
                    return true;
                } else {
                    $('#success').html('<div class="col-md-12 text-center">' + messgaeError + '</div>');
                    return false;
                }
                return false;
            });
        });

        var map = null;
        var latitude;
        var longitude;

        function inicializemap() {
            latitude = 41.3349509;
            longitude = 19.8217028;

            var egglabs = new google.maps.LatLng(latitude, longitude);
            var egglabs1 = new google.maps.LatLng(43.0630171, 89.2296082);
            var egglabs2 = new google.maps.LatLng(13.0630171, 80.2296082);


            var image = new google.maps.MarkerImage('../images/marker.png', new google.maps.Size(84, 56), new google.maps.Point(0, 0), new google.maps.Point(42, 56));
            var mapCoordinates = new google.maps.LatLng(latitude, longitude);
            var mapOptions = {
                backgroundColor: '#ffffff',
                zoom: 10,
                disableDefaultUI: true,
                center: mapCoordinates,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: true,
                draggable: true,
                zoomControl: false,
                disableDoubleClickZoom: true,
                mapTypeControl: false,
                styles: [{
                        "featureType": "all",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#1f242f"
                        }]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.icon",
                        "stylers": [{
                            "hue": "#ff9d00"
                        }]
                    },
                    {
                        "featureType": "landscape.man_made",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#fef8ef"
                        }]
                    },
                    {
                        "featureType": "poi.medical",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "hue": "#ff0000"
                        }]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#c9d142"
                            },
                            {
                                "lightness": "0"
                            },
                            {
                                "visibility": "on"
                            },
                            {
                                "weight": "1"
                            },
                            {
                                "gamma": "1.98"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [{
                            "weight": "1.00"
                        }]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#d7b19c"
                            },
                            {
                                "weight": "1"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "weight": "4.03"
                        }]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "visibility": "off"
                            },
                            {
                                "color": "#ffed00"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway.controlled_access",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    },
                    {
                        "featureType": "transit.line",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#cbcbcb"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#0b727f"
                        }]
                    }
                ]
            };

            map = new google.maps.Map(document.getElementById('map-canvas-holder'), mapOptions);
            marker = new google.maps.Marker({
                position: egglabs,
                raiseOnDrag: false,
                icon: image,
                map: map,
                draggable: false,
                title: 'ATIS1'
            });
            marker = new google.maps.Marker({
                position: egglabs1,
                raiseOnDrag: false,
                icon: image,
                map: map,
                draggable: false,
                title: 'ATIS2'
            });
            marker = new google.maps.Marker({
                position: egglabs2,
                raiseOnDrag: false,
                icon: image,
                map: map,
                draggable: false,
                title: 'ATIS3'
            });
            google.maps.event.addListener(map, 'zoom_changed', function() {
                var center = map.getCenter();
                google.maps.event.trigger(map, 'resize');
                map.setCenter(center);
            });
        }
    </script>


    </div>
</body>

</html>