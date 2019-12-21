<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<?php //var_dump($users); ?>
<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <style>
        #go-again {
            cursor: pointer;
            position: absolute;
            bottom: 5vh;
            right: 5vw;
            color: #9a9a9a;
            font-family: Futura, Helvetica Neue;
        }
        #stage {
            position: relative;
            top: calc(10vh - 6vh);
            left: calc(35vw - 20vw);
            text-align: center;
            width: 50vw;
            font-size: 4vh;
            line-height: 1;
            letter-spacing: 0.5vh;
            -webkit-filter: contrast(20);
        }

        h1 {
            display: none;
            font-family: Futura, Helvetica Neue;
            color: black;
            font-size: 2rem;

        }

        h1.letterified {
            display: initial;

        }

        [data-letter] {
            transform: translate3d(0, 0, 0);
            position: relative;
            font-weight: 100;
            margin: 0 4px;
            left: 0;
            opacity: 0;
            animation:  2s focus 1s forwards ease-in-out,
            2s blur 5s forwards  ease-in-out,
            2s slideright 5s forwards ease-in-out ;
        }

        [data-letter="B"], [data-letter="E"], [data-letter="R"], [data-letter="L"], [data-letter="I"], [data-letter="N"]  {
            font-weight: 300;
            opacity: 1;
            filter: blur(0px), contrast(0);
            animation:  slideleft 1s ease-in-out,
            fadein 2s ease-in-out,
            2s blur 5s alternate forwards ease-in-out,
            2s slideright 5s forwards ease-in-out;
        }


        @keyframes fadein {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideleft {
            from {
                left: -7px;
            }
            to {
                left: 0px;
            }
        }

        @keyframes slideright {
            from {
                left: 0px;
            }
            to {

                left: -50px;
            }
        }


        @keyframes focus {
            from {
                opacity: 0;
                /*color: white;*/
                -webkit-filter: blur(10px);
            }
            to {
                /*color: black;*/
                opacity: 1;
                -webkit-filter: blur(0px);
            }
        }

        @keyframes blur {
            from {
                /*color: black;*/
                opacity: 1;
                -webkit-filter: blur(0px);
            }
            to {
                /*color: white;*/
                opacity: 0;
                -webkit-filter: blur(10px);
            }
        }
    </style>
      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card-body">

                    <div id="stage">
                        <h1></h1>
                    </div>

                    <div id="go-again">( go again )</div>

                </div>
              <div class="card card-statistic-2" style="margin-top: 50px">
                  <div class="card-chart">
                      <canvas id="balance-chart" height="80"></canvas>
                  </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>ALL TUTUP INDIHOME</h4>
                  </div>
                  <div class="card-body">
                      <?php
                      $total = null;
                      foreach ($total_revenue->result() as $row) { ?>
                              <?php $total = $total + $row->id ?>
                      <?php } ?>
                      <?php echo $total ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2">
                  <div class="card-chart">
                      <canvas id="sales-chart" height="80"></canvas>
                  </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>USER</h4>
                  </div>
                  <div class="card-body">
                      <?php echo $total_users->id; ?>
                  </div>
                </div>
              </div>
            </div>

<!--            <div class="col-lg-6 col-md-6 col-sm-12">-->
<!--              <div class="card card-statistic-2">-->
<!--                  <div class="card-chart">-->
<!--                      <canvas id="sales-chart2" height="80"></canvas>-->
<!--                  </div>-->
<!--                <div class="card-icon shadow-primary bg-primary">-->
<!--                  <i class="fas fa-dollar-sign"></i>-->
<!--                </div>-->
<!--                <div class="card-wrap">-->
<!--                  <div class="card-header">-->
<!--                    <h4>Year to Year Revenue</h4>-->
<!--                  </div>-->
<!--                  <div class="card-body">-->
<!---->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--            <div class="col-lg-6 col-md-6 col-sm-12">-->
<!--              <div class="card card-statistic-2">-->
<!--                  <div class="card-chart">-->
<!--                      <canvas id="chart1" height="80"></canvas>-->
<!--                  </div>-->
<!--                  <div class="card-icon shadow-primary bg-primary">-->
<!--                      <i class="fas fa-dollar-sign"></i>-->
<!--                  </div>-->
<!--                  <div class="card-wrap">-->
<!--                      <div class="card-header">-->
<!--                          <h4>Total Revenue</h4>-->
<!--                      </div>-->
<!--                      <div class="card-body">-->
<!--                          -->
<!--                      </div>-->
<!--                  </div>-->
<!--              </div>-->
<!--          </div>-->
          </div>
        </section>
      </div>
    <script>
        function letterify(userOptions) {
            var options = {
                scope: document,
                selector: false,
                segmentClass: 'letterified'
            };

            if (typeof userOptions === "string") {
                options.selector = userOptions;
            } else if (typeof userOptions === 'object') {
                Object.keys(userOptions).forEach(function(key) {
                    options[key] = userOptions[key];
                });
            }


            var selected;

            if (!options.selector) {
                return false
            } else {
                selected = document.querySelector(options.selector);
            }

            selected.classList.remove('letterified');

            var elems = options.scope.querySelectorAll(options.selector);

            [].forEach.call(elems, function(el, idx) {

                var split = el.textContent.split('');
                var frag = document.createDocumentFragment();
                split.forEach(function(letter) {
                    var span = document.createElement('span');
                    span.textContent = letter;
                    span.setAttribute('data-letter', letter);
                    span.className = options.segmentClass;
                    span.style.animationDelay = '0,0,2s,5s,5s';
                    frag.appendChild(span);

                });
                el.textContent = null;
                el.appendChild(frag);
            });

            selected.classList.add('letterified');

        }

        var strings = [
            "Without big data", "you are blind and deaf and in the middle of a freeway – Geoffrey Moore",
            "In God we trust, all others bring data. — W Edwards Deming",
            "Data is the new oil. — Clive Humby",
            "No great marketing decisions have ever been made on qualitative data. – John Sculley",
            "Torture the data, and it will confess to anything. – Ronald Coase",
            "With data collection, ‘the sooner the better’ is always the best answer. – Marissa Mayer",
            "Big data isn’t about bits, it’s about talent. – Douglas Merrill",
            "It is a capital mistake to theorize before one has data. — Sherlock Holmes",
            "Without a systematic way to start and keep data clean, bad data will happen. — Donato Diorio",
            "You can have data without information, but you cannot have information without data. — Daniel Keys Moran",
            "If we have data, let’s look at data. If all we have are opinions, let’s go with mine. — Jim Barksdale",
            "Above all else, show the data. – Edward R. Tufte",
            "Big data is at the foundation of all of the megatrends that are happening today, from social to mobile to the cloud to gaming. – Chris Lynch",
            "Data are just summaries of thousands of stories – tell a few of those stories to help make the data meaningful. — Chip & Dan Heath",
            "Data beats emotions. – Sean Rad",
            "Contact data ages like fish not wine…it gets worse as it gets older, not better. — Gregg Thaler",
            "Data really powers everything that we do. – Jeff Weiner",
            "Data that is loved tends to survive. – Kurt Bollacker",
            "Errors using inadequate data are much less than those using no data at all. – Charles Babbage",
            "Where there is data smoke, there is business fire.  — Thomas Redman"
        ];

        var holder = document.querySelector('h1');

        function putText(text, strings){
            holder.classList.remove('letterified');
            holder.textContent = text.toUpperCase();
            letterify('h1');
            queueText(strings);
        }

        var lastQueuedAnim;

        function queueText(strings){
            var next = strings.shift();
            if (next) {
                lastQueuedAnim =  setTimeout(putText.bind(null, next, strings), 7000);
            }
        }

        function go(){
            if (lastQueuedAnim){
                clearTimeout(lastQueuedAnim);
            }
            var text = strings.slice();
            putText(text.shift(), text);
        }

        document.getElementById('go-again').addEventListener('click', go)

        go();
    </script>
<!--script-->
    <script>
        $(document).ready(function() {
        var chart1 = document.getElementById("chart1").getContext('2d');

        var chart1_bg_color = chart1.createLinearGradient(0, 0, 0, 70);
        chart1_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
        chart1_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

        var myChart = new Chart(chart1, {
            type: 'line',
            data: {
                labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
                datasets: [{
                    label: 'Balance',
                    data: [50, 61, 80, 50, 72, 52, 60, 41, 30, 45, 70, 40, 93, 63, 50, 62],
                    backgroundColor: balance_chart_bg_color,
                    borderWidth: 3,
                    borderColor: 'rgba(63,82,227,1)',
                    pointBorderWidth: 0,
                    pointBorderColor: 'transparent',
                    pointRadius: 3,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,1)',
                }]
            },
            options: {
                layout: {
                    padding: {
                        bottom: -1,
                        left: -1
                    }
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            beginAtZero: true,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false,
                        },
                        ticks: {
                            display: false
                        }
                    }]
                },
            }
        });
        });
    </script>
    <script>
        $(document).ready(function() {
            var sales_chart2 = document.getElementById("sales-chart2").getContext('2d');

            var sales_chart_bg_color = sales_chart2.createLinearGradient(0, 0, 0, 80);
            balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
            balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

            var myChart = new Chart(sales_chart2, {
                type: 'line',
                data: {
                    labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
                    datasets: [{
                        label: 'Sales',
                        data: [70, 62, 44, 40, 21, 63, 82, 52, 50, 31, 70, 50, 91, 63, 51, 60],
                        borderWidth: 2,
                        backgroundColor: balance_chart_bg_color,
                        borderWidth: 3,
                        borderColor: 'rgba(63,82,227,1)',
                        pointBorderWidth: 0,
                        pointBorderColor: 'transparent',
                        pointRadius: 3,
                        pointBackgroundColor: 'transparent',
                        pointHoverBackgroundColor: 'rgba(63,82,227,1)',
                    }]
                },
                options: {
                    layout: {
                        padding: {
                            bottom: -1,
                            left: -1
                        }
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                beginAtZero: true,
                                display: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                drawBorder: false,
                                display: false,
                            },
                            ticks: {
                                display: false
                            }
                        }]
                    },
                }
            });
        });
    </script>

    <!-- Start of LiveChat (www.livechatinc.com) code -->
    <script type="text/javascript">
        window.__lc = window.__lc || {};
        window.__lc.license = 11573093;
        (function() {
            var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
            lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
        })();
    </script>
    <noscript>
        <a href="https://www.livechatinc.com/chat-with/11573093/" rel="nofollow">Chat with us</a>,
        powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a>
    </noscript>
    <!-- End of LiveChat code -->


<?php $this->load->view('dist/_partials/footer'); ?>