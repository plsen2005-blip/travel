<!-- Header -->
<?php
include('layout/header.php');
?>

        <!-- Start aside  -->
        <aside>
           <!-- Nav -->
<?php
include('layout/nav.php');
?>
            <!-- Start Data Cards  -->
            <div class="data-card">
                <div class="card">
                    <div class="icon"><i class="bi bi-backpack2-fill"></i></div>
                    <div class="cont">
                        <h1><span id="bookings"></span> <sub><i class="bi bi-arrow-up-right"></i>1.3%</sub></h1>
                        <h5>Bookings</h5>
                    </div>
                </div>
                <div class="card">
                    <div class="icon"><i class="bi bi-buildings-fill"></i></div>
                      <div class="cont">
                        <h1><span id="hotel"></span> <sub><i class="bi bi-arrow-down-right"></i>1.3%</sub></h1>
                        <h5>Hotels</h5>
                    </div>
                </div>
                <div class="card">
                    <div class="icon"><i class="bi bi-people-fill"></i></div>
                      <div class="cont">
                        <h1><span id="user"></span> <sub><i class="bi bi-arrow-up-right"></i>1.3%</sub></h1>
                        <h5>Users</h5>
                    </div>
                </div>
                <div class="card">
                    <div class="icon"><i class="bi bi-currency-rupee"></i></div>
                      <div class="cont">
                        <h1><span id="revenue"></span> <sub><i class="bi bi-arrow-up-right"></i>1.3%</sub></h1>
                        <h5>Revenue</h5>
                    </div>
                </div>
            </div>

            <script>
                let fetchData = async () => {
                    try {
                        const response = await fetch("<?php echo base_url("Dashboard/data_count");?>" ,{
                            method: 'GET',
                            headers: {
                                "Content-Type":"application/json"
                            }
                        })

                        const data = await response.json();

                        if (data) {
                            
                            document.getElementById('bookings').innerText = data[0].bookings;
                            document.getElementById('hotel').innerText = data[0].hotel;
                            document.getElementById('user').innerText = data[0].user;
                            document.getElementById('revenue').innerText = data[0].revenue;
                        }
                    } catch (error) {
                        console.log(error);
                    }
                }

                fetchData()
            </script>

            <!-- Map Start  -->
            <div class="map_data">
                <div class="left">
                    <div class="map" id="map"></div>
                    <div class="right_sec">
                        <div class="head">
                            <h5>Users by gender</h5>
                            <i class="bi bi-three-dots"></i>
                        </div>
                        <div class="age">
                            <svg>
                                <circle cx="30" cy="30" r="40" />
                                <circle cx="50" cy="50" r="60" />
                                <circle cx="30" cy="30" r="40" />
                                <circle cx="50" cy="50" r="60" />
                            </svg>
                        </div>

                        <div class="det">
                            <h6>Male Gender (75%)</h6>
                            <h6>Female Gender (60%)</h6>
                        </div>
                    </div>

                    <div class="last_left">
                        <div class="left_left_bx" id="booking_per">
                            <li><h5>Popular Hotels</h5><a href="<?php echo base_url("/hotels")?>">More</a></li>
                            
                        </div>

                          <script>
                let fetchBookingPercentage = async () => {
                    try {
                        const response = await fetch("<?php echo base_url("Dashboard/booking_per");?>" ,{
                            method: 'GET',
                            headers: {
                                "Content-Type":"application/json"
                            }
                        })

                        const data = await response.json();

                        if (data) {
                            
                            data.forEach(element => {
                                let card = document.createElement('li');
                                card.innerHTML = `
                                <span><img src="<?php echo base_url('/assets/img/Hotels-photos/');?>${element.poster}" alt="${element.hotelName}" style = "width:25px; height:25px; border-radius:3px;"> ${element.hotelName}</span><span>${Math.floor((element.count/element.totel*100))}%</span>
                                `;

                                document.getElementById('booking_per').appendChild(card);

                            });
                        }
                    } catch (error) {
                        console.log(error);
                    }
                }

                fetchBookingPercentage()
            </script>



                        <div class="left_right_bx" id="fetchNewHotels">
                            <li><h5>New Hotels</h5><a href="<?php echo base_url("/hotels")?>">More</a></li>
                            
                        </div>

                         <script>
                let fetchNewHotels = async () => {
                    try {
                        const response = await fetch("<?php echo base_url("Dashboard/new_hotels");?>" ,{
                            method: 'GET',
                            headers: {
                                "Content-Type":"application/json"
                            }
                        })

                        const data = await response.json();

                        if (data) {
                            
                            data.forEach(element => {
                                let card = document.createElement('li');
                                card.innerHTML = `
                                <span><img src="<?php echo base_url('/assets/img/Hotels-photos/');?>${element.poster}" alt="${element.name}"> ${element.name} <b>${element.city}</b></span><span>
                                `;

                                document.getElementById('fetchNewHotels').appendChild(card);

                            });
                        }
                    } catch (error) {
                        console.log(error);
                    }
                }

                fetchNewHotels()
            </script>
                    </div>
                </div>
                <div class="right">
                    <div class="right_list">
                        <div class="head">
                            <h5>Booking request</h5>
                            <i class="bi bi-three-dots"></i>
                        </div>

                        <div class="main_chart">
                            <div class="chart" id="chart"></div>
                        </div>


                        <script>
                let fetchAllBookingsMonthly = async () => {
                    try {
                        const response = await fetch("<?php echo base_url("Dashboard/all_bookings_monthly");?>" ,{
                            method: 'GET',
                            headers: {
                                "Content-Type":"application/json"
                            }
                        })

                        const data = await response.json();

                        if (data) {
                            // console.log(data)

                        }
                    } catch (error) {
                        console.log(error);
                    }
                }

                fetchAllBookingsMonthly()
            </script>

                        <ul id="all_bookings">
                           
                        </ul>


                        <!-- all_bookings -->

                        <script>
                let fetchAllBookings = async () => {
                    try {
                        const response = await fetch("<?php echo base_url("Dashboard/all_bookings");?>" ,{
                            method: 'GET',
                            headers: {
                                "Content-Type":"application/json"
                            }
                        })

                        const data = await response.json();

                        if (data) {

                        const monthsShort = [
                            "Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"
                        ];
                            
                            data.forEach(element => {
                                let card = document.createElement('li');
                                card.innerHTML = `
                                <div class="profile_det">
                                    <img src="<?php echo base_url('/assets/img/Hotels-photos/');?>${element.poster}" alt="">
                                    <div class="title_date">
                                        <h6>${element.booking_username}</h6>
                                        <p>${element.create_at.split(' ')[0].split('-')[2]} ${monthsShort[+element.create_at.split(' ')[0].split('-')[1]]} ${element.create_at.split(' ')[0].split('-')[0]} </p>
                                    </div>
                                </div>
                                <button>₹ ${element.price * element.nights}</button>
                                `;

                                document.getElementById('all_bookings').appendChild(card);

                            });
                        }
                    } catch (error) {
                        console.log(error);
                    }
                }

                fetchAllBookings()
            </script>
                    </div>
                </div>
            </div>
        </aside>

    </header>


    <!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>


<!-- Chart code -->
<script>
    let createCh = (cityData) => {
        am5.ready(function() {
    
    
    
    var root = am5.Root.new("map");
    root.setThemes([am5themes_Animated.new(root)]);
    
    var chart = root.container.children.push(am5map.MapChart.new(root, {}));
    
    var polygonSeries = chart.series.push(
      am5map.MapPolygonSeries.new(root, {
        geoJSON: am5geodata_worldLow,
        exclude: ["AQ"]
      })
    );
    
    var bubbleSeries = chart.series.push(
      am5map.MapPointSeries.new(root, {
        valueField: "value",
        calculateAggregates: true,
        polygonIdField: "id"
      })
    );
    
    var circleTemplate = am5.Template.new({});
    
    bubbleSeries.bullets.push(function(root, series, dataItem) {
      var container = am5.Container.new(root, {});
    
      var circle = container.children.push(
        am5.Circle.new(root, {
          radius: 20,
          fillOpacity: 0.7,
          fill: am5.color(0x1b2c56),
          cursorOverStyle: "pointer",
          tooltipText: `{name}: [bold]{value}[/]`
        }, circleTemplate)
      );
    
      var countryLabel = container.children.push(
        am5.Label.new(root, {
          text: "{name}",
          paddingLeft: 5,
          populateText: true,
          fontWeight: "bold",
          fontSize: 13,
          centerY: am5.p50
        })
      );
    
      circle.on("radius", function(radius) {
        countryLabel.set("x", radius);
      })
    
      return am5.Bullet.new(root, {
        sprite: container,
        dynamic: true
      });
    });
    
    bubbleSeries.bullets.push(function(root, series, dataItem) {
      return am5.Bullet.new(root, {
        sprite: am5.Label.new(root, {
          text: "{value.formatNumber('#.')}",
          fill: am5.color(0xffffff),
          populateText: true,
          centerX: am5.p50,
          centerY: am5.p50,
          textAlign: "center"
        }),
        dynamic: true
      });
    });
    
    
    
    // minValue and maxValue must be set for the animations to work
    bubbleSeries.set("heatRules", [
      {
        target: circleTemplate,
        dataField: "value",
        min: 10,
        max: 50,
        minValue: 0,
        maxValue: 1000,
        key: "radius"
      }
    ]);
    
    //bubbleSeries.data.setAll(data);
    
   PointSeries.bullets.push(function() {
    var cirlce = am5.Circle.new(root , {
        radius: 6,
        tooltipy: 0,
        fill: am5.color(0x1b2c56),
        tooltiptext: "{title}"
    })
   })

   let addCity = (log , lat , title) => {
    PointSeries.data.push({
        geometry: {
            type: 'Point',
            coordinates: [log , lat]
        },
        title: title
    })
   }
    for (let i = 0; i < cityData.length; i++) {
    var city = cityData[i];
    addCity(city.log , city.lat , city.title)
   }
    
}); // end am5.ready()
    }


    let fetchAllcityes = async () => {
                    try {
                        const response = await fetch("<?php echo base_url("Dashboard/hotel_cityes");?>" ,{
                            method: 'GET',
                            headers: {
                                "Content-Type":"application/json"
                            }
                        })

                        const data = await response.json();

                        if (data) {

                        let cityData = [];
                        data.forEach((el , i) => {
                            let obj = {
                                title: el.city,
                                lat: el.lat,
                                log: el.log
                            }
                            cityData.push(obj)
                        })

                        createCh(cityData);

                        }
                    } catch (error) {
                        console.log(error);
                    }
                }

                fetchAllcityes()
    </script>


<!-- Any Chart  -->
<script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-core.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-cartesian.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-base.min.js"></script>




<script>
                let fetchAllBookingsMonthly = async () => {
                    try {
                        const response = await fetch("<?php echo base_url("Dashboard/all_bookings_monthly");?>" ,{
                            method: 'GET',
                            headers: {
                                "Content-Type":"application/json"
                            }
                        })

                        const data = await response.json();

                        if (data) {

                        let result = [];
                        data.forEach((el , i) => {
                            result.push([el.month_short , +el.booking_count]);
                        })



                            // create a chart
chart = anychart.area();

// create a spline area series and set the result
var series = chart.splineArea(result);
// series.color('red ')

// set the container id
chart.container("chart");

// initiate drawing the chart
chart.draw();

                        }
                    } catch (error) {
                        console.log(error);
                    }
                }

                fetchAllBookingsMonthly()
            </script>

</body>
</html>