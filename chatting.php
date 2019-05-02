<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Aphrodite</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
        .nav-link {
            color: white;
        }

        .bg-luxury-blue {
            background: #002A54;
        }

        .dropdown-toggle:after {
            content: none
        }

        .container {
            max-width: 1170px;
            margin: auto;
        }

        img {
            max-width: 100%;
        }

        .inbox_people {
            background: #f8f8f8 none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 40%;
            border-right: 1px solid #c4c4c4;
        }

        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
        }

        .top_spac {
            margin: 20px 0 0;
        }


        .recent_heading {
            float: left;
            width: 40%;
        }

        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%;
            padding:
        }

        .headind_srch {
            padding: 10px 29px 10px 20px;
            overflow: hidden;
            border-bottom: 1px solid #c4c4c4;
        }

        .recent_heading h4 {
            color: #05728f;
            font-size: 21px;
            margin: auto;
        }

        .srch_bar input {
            border: 1px solid #cdcdcd;
            border-width: 0 0 1px 0;
            width: 80%;
            padding: 2px 0 4px 6px;
            background: none;
        }

        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }

        .srch_bar .input-group-addon {
            margin: 0 0 0 -27px;
        }

        .chat_ib h5 {
            font-size: 15px;
            color: #464646;
            margin: 0 0 8px 0;
        }

        .chat_ib h5 span {
            font-size: 13px;
            float: right;
        }

        .chat_ib p {
            font-size: 14px;
            color: #989898;
            margin: auto
        }

        .chat_img {
            float: left;
            width: 11%;
        }

        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }

        .chat_people {
            overflow: hidden;
            clear: both;
        }

        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }

        .inbox_chat {
            height: 550px;
            overflow-y: scroll;
        }

        .active_chat {
            background: #ebebeb;
        }

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }

        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }

        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }

        .received_withd_msg {
            width: 57%;
        }

        .mesgs {
            float: left;
            padding: 30px 15px 0 25px;
            width: 60%;
        }

        .sent_msg p {
            background: #05728f none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .outgoing_msg {
            overflow: hidden;
            margin: 26px 0 26px;
        }

        .sent_msg {
            float: right;
            width: 46%;
        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }

        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }

        .messaging {
            padding: 0 0 50px 0;
        }

        .msg_history {
            height: 516px;
            overflow-y: auto;
        }
    </style>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>
<style>


  .footer {
      background-color: #002A54;
      color :white;
  }
 </style>

<body class="bg-light">
      <!-- Navbar -->
      <nav class="fixed-top navbar navbar-expand-lg navbar-dark bg-luxury-blue text-white">
          <a class="navbar-brand" href="home.php">
              <img src="img/logo/logo_font_white.svg" style="height:23px;" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto container-fluid justify-content-between">
              <div class="dropdown">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
       Category
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="category_men.html">Men</a>
        <a class="dropdown-item" href="category_woman.html">Woman</a>
      </div>
    </div>
  
                  <li class="col-12 col-lg-9">
                  <form action="search.php" method="GET">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search..." name="search">
                          <div class="input-group-append">
                              <button type="button" class="btn btn-primary">
                                  <i class="fa fa-search"></i>
                              </button>
                          </div>
                      </div>
                  </form>
                  </li>
                  <li class="nav-item">
                      <a href="cart.php" class="nav-link">
                          <i class="fas fa-shopping-cart"></i>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="fas fa-bell"></i>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="chatting.php" class="nav-link">
                          <i class="fas fa-envelope"></i>
                      </a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white text-capitalize text-center" href="#" id="navbarDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-user"></i>
                          <?php
                                  echo $_SESSION['username'];
                              ?>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a href="#" class="dropdown-item text-center text-capitalize">
                          <i class="fas fa-user"></i>
                              <?php
                                  echo $_SESSION['username'];
                              ?>
                          </a>
                          <div class="dropdown-divider"></div>
                          <div class="container">
                              <a class="btn col-12" href="history.php">
                                  History
                              </a>
                          </div>
                          <div class="dropdown-divider"></div>
                          <div class="container">
                              <a class="btn btn-primary col-12" href="login.php">
                                  <i class="fas fa-sign-out-alt"></i>
                                  Logout
                              </a>
                          </div>
                      </div>
                  </li>
              </ul>
          </div>
      </nav>

    <section class="konten" style="margin-top:75px;">
        <div class="container">
            <h4 class=" text-center">Messaging</h4>
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="inbox_people">
                        <div class="headind_srch">
                            <div class="recent_heading">
                                <h4>Recent</h4>
                            </div>
                            <div class="srch_bar">
                                <div class="stylish-input-group">
                                    <input type="text" class="search-bar" placeholder="Search">
                                    <span class="input-group-addon">
                                        <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                    </span> </div>
                            </div>
                        </div>
                        <div class="inbox_chat">
                            <div class="chat_list active_chat">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                            alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Lilian Liwanto <span class="chat_date">Apr 30</span></h5>
                                        <p>
                                            Semangat, Presentasi sudah dekat. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                            alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Lilian Liwanto <span class="chat_date">Apr 30</span></h5>
                                        <p>
                                            Semangat, Presentasi sudah dekat.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                            alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Lilian Liwanto <span class="chat_date">Apr 30</span></h5>
                                        <p>
                                            Semangat Presentasi sudah dekat.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                            alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Lilian Liwanto <span class="chat_date">Apr 30</span></h5>
                                        <p>
                                            Semangat, Presentasi sudah dekat.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                            alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Lilian Liwanto <span class="chat_date">Apr 30</span></h5>
                                        <p>
                                            Semangat, Presentasi sudah dekat.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                            alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Lilian Liwanto <span class="chat_date">Apr 30</span></h5>
                                        <p>
                                            Semangat, Presentasi sudah dekat.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                            alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Lilian Liwanto <span class="chat_date">Apr 30</span></h5>
                                        <p>
                                            Semangat, Presentasi sudah dekat.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mesgs">
                        <div class="msg_history">
                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img
                                        src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>
                                            Masih ada masalah Lilian, tolong diperbaiki dan diperjelas.
                                        </p>
                                        <span class="time_date"> 11:01 AM | Apr 30</span>
                                    </div>
                                </div>
                            </div>
                            <div class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>
                                        Sudah aku kerjakan, cuma belum aku committ hehe
                                    </p>
                                    <span class="time_date"> 11:01 AM | Apr 30</span>
                                </div>
                            </div>
                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img
                                        src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>
                                            Dibagian pengiriman kolom alamat dan harga tidak sesuai.
                                        </p>
                                        <span class="time_date"> 07:22 AM | Yesterday</span>
                                    </div>
                                </div>
                            </div>
                            <div class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>Iya, sudah coba push.</p>
                                    <span class="time_date"> 09:20 AM | Today</span>
                                </div>
                            </div>
                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img
                                        src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>Semangat, Presentasi sudah dekat.</p>
                                        <span class="time_date"> 06:02 PM | Today</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="type_msg">
                            <div class="input_msg_write">
                                <input type="text" class="write_msg" placeholder="Type a message" />
                                <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>