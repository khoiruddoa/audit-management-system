@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pustaka Program Audit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pustaka Audit</li>
                    <li class="breadcrumb-item active">Pustaka Program Audit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="container">
                <div class="w-95 w-md-75 w-lg-60 w-xl-55 mx-auto mb-6 text-center">
                <div class="subtitle alt-font"><span class="text-primary">#04</span><span class="title">Timetable</span></div>
                <h2 class="display-18 display-md-16 display-lg-14 mb-0">Committed to fabulous and great <span class="text-primary">#Timetable</span></h2>
                </div>
                <div class="row">
                <div class="col-md-12">
                <div class="schedule-table">
                <table class="table bg-white">
                <thead>
                <tr>
                <th>Routine</th>
                <th>10 am</th>
                <th>11 am</th>
                <th>03 pm</th>
                <th>05 pm</th>
                <th class="last">07 pm</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td class="day">Sunday</td>
                <td class="active">
                <h4>Weight Loss</h4>
                <p>10 am - 11 am</p>
                <div class="hover">
                <h4>Weight Loss</h4>
                <p>10 am - 11 am</p>
                <span>Wayne Ponce</span>
                </div>
                </td>
                <td></td>
                <td class="active">
                <h4>Yoga</h4>
                <p>03 pm - 04 pm</p>
                <div class="hover">
                <h4>Yoga</h4>
                <p>03 pm - 04 pm</p>
                <span>Francisco Watt</span>
                </div>
                </td>
                <td class="active">
                <h4>Boxing</h4>
                <p>05 pm - 06 pm</p>
                <div class="hover">
                <h4>Boxing</h4>
                <p>05 pm - 046am</p>
                <span>Charles King</span>
                </div>
                </td>
                <td></td>
                </tr>
                <tr>
                <td class="day">Monday</td>
                <td></td>
                <td class="active">
                <h4>Cycling</h4>
                <p>11 am - 12 pm</p>
                <div class="hover">
                <h4>Cycling</h4>
                <p>11 am - 12 pm</p>
                <span>Tabitha Potter</span>
                </div>
                </td>
                <td class="active">
                <h4>Karate</h4>
                <p>03 pm - 05 pm</p>
                <div class="hover">
                <h4>Karate</h4>
                <p>03 pm - 05 pm</p>
                <span>Lester Gray</span>
                </div>
                </td>
                <td></td>
                <td class="active">
                <h4>Crossfit</h4>
                <p>07 pm - 08 pm</p>
                <div class="hover">
                <h4>Crossfit</h4>
                <p>07 pm - 08 pm</p>
                <span>Candi Yip</span>
                </div>
                </td>
                </tr>
                <tr>
                <td class="day">Tuesday</td>
                <td class="active">
                <h4>Spinning</h4>
                <p>10 am - 11 am</p>
                <div class="hover">
                <h4>Spinning</h4>
                <p>10 am - 11 am</p>
                <span>Mary Cass</span>
                </div>
                </td>
                <td></td>
                <td></td>
                <td class="active">
                <h4>Bootcamp</h4>
                <p>05 pm - 06 pm</p>
                <div class="hover">
                <h4>Bootcamp</h4>
                <p>05 pm - 06 pm</p>
                <span>Brenda Mastropietro</span>
                </div>
                </td>
                <td class="active">
                <h4>Boxercise</h4>
                <p>07 pm - 08 pm</p>
                <div class="hover">
                <h4>Boxercise</h4>
                <p>07 pm - 08 pm</p>
                <span>Marlene Bruce</span>
                </div>
                </td>
                </tr>
                <tr>
                <td class="day">Wednesday</td>
                <td class="active">
                <h4>Body Building</h4>
                <p>10 am - 12 pm</p>
                <div class="hover">
                <h4>Body Building</h4>
                <p>10 am - 12 pm</p>
                <span>Brenda Hester</span>
                </div>
                </td>
                <td></td>
                <td class="active">
                <h4>Dance</h4>
                <p>03 pm - 05 pm</p>
                <div class="hover">
                <h4>Dance</h4>
                <p>03 pm - 05 pm</p>
                <span>Brian Ashworth</span>
                </div>
                </td>
                <td></td>
                <td class="active">
                <h4>Health</h4>
                <p>07 pm - 08 pm</p>
                <div class="hover">
                <h4>Health</h4>
                <p>07 pm - 08 pm</p>
                <span>Mark Croteau</span>
                </div>
                </td>
                </tr>
                <tr>
                <td class="day">Thursday</td>
                <td></td>
                <td class="active">
                <h4>Bootcamp</h4>
                <p>11 am - 12 pm</p>
                <div class="hover">
                <h4>Bootcamp</h4>
                <p>1 am - 12 pm</p>
                <span>Elisabeth Schreck</span>
                </div>
                </td>
                <td></td>
                <td class="active">
                <h4>Boday Building</h4>
                <p>05 pm - 06 pm</p>
                <div class="hover">
                <h4>Boday Building</h4>
                <p>05 pm - 06 pm</p>
                <span>Edward Garcia</span>
                </div>
                </td>
                <td></td>
                </tr>
                <tr>
                <td class="day">Friday</td>
                <td class="active">
                <h4>Racing</h4>
                <p>10 am - 11 am</p>
                <div class="hover">
                <h4>Racing</h4>
                <p>10 am - 11 am</p>
                <span>Jackie Potts</span>
                </div>
                </td>
                <td></td>
                <td class="active">
                <h4>Energy Blast</h4>
                <p>03 pm - 05 pm</p>
                <div class="hover">
                <h4>Energy Blast</h4>
                <p>03 pm - 05 pm</p>
                <span>Travis Brown</span>
                </div>
                </td>
                <td></td>
                <td class="active">
                <h4>Jumping</h4>
                <p>07 pm - 08 pm</p>
                <div class="hover">
                <h4>Jumping</h4>
                <p>07 pm - 08 pm</p>
                <span>Benjamin Barnett</span>
                </div>
                </td>
                </tr>
                <tr>
                <td class="day">Satarday</td>
                <td></td>
                <td></td>
                <td class="active">
                <h4>Aerobics</h4>
                <p>03 pm - 04 pm</p>
                <div class="hover">
                <h4>Aerobics</h4>
                <p>03 pm - 04 pm</p>
                <span>Andre Walls</span>
                </div>
                </td>
                <td class="active">
                <h4>Cycling</h4>
                <p>05 pm - 06 pm</p>
                <div class="hover">
                <h4>Cycling</h4>
                <p>05 pm - 06 pm</p>
                <span>Margaret Thomas</span>
                </div>
                </td>
                <td></td>
                </tr>
                </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
          <style>
            body{margin-top:20px;}
          .schedule-table table thead tr {
          background: #86d4f5;
          }
          .schedule-table table thead th {
          padding: 25px 50px;
          color: #fff;
          text-align: center;
          font-size: 20px;
          font-weight: 800;
          position: relative;
          border: 0;
          }
          .schedule-table table thead th:before {
          content: "";
          width: 3px;
          height: 35px;
          background: rgba(255, 255, 255, 0.2);
          position: absolute;
          right: -1px;
          top: 50%;
          transform: translateY(-50%);
          }
          .schedule-table table thead th.last:before {
          content: none;
          }
          .schedule-table table tbody td {
          vertical-align: middle;
          border: 1px solid #e2edf8;
          font-weight: 500;
          padding: 30px;
          text-align: center;
          }
          .schedule-table table tbody td.day {
          font-size: 22px;
          font-weight: 600;
          background: #f0f1f3;
          border: 1px solid #e4e4e4;
          position: relative;
          transition: all 0.3s linear 0s;
          min-width: 165px;
          }
          .schedule-table table tbody td.active {
          position: relative;
          z-index: 10;
          transition: all 0.3s linear 0s;
          min-width: 165px;
          }
          .schedule-table table tbody td.active h4 {
          font-weight: 700;
          color: #000;
          font-size: 20px;
          margin-bottom: 5px;
          }
          .schedule-table table tbody td.active p {
          font-size: 16px;
          line-height: normal;
          margin-bottom: 0;
          }
          .schedule-table table tbody td .hover h4 {
          font-weight: 700;
          font-size: 20px;
          color: #ffffff;
          margin-bottom: 5px;
          }
          .schedule-table table tbody td .hover p {
          font-size: 16px;
          margin-bottom: 5px;
          color: #ffffff;
          line-height: normal;
          }
          .schedule-table table tbody td .hover span {
          color: #ffffff;
          font-weight: 600;
          font-size: 18px;
          }
          .schedule-table table tbody td.active::before {
          position: absolute;
          content: "";
          min-width: 100%;
          min-height: 100%;
          transform: scale(0);
          top: 0;
          left: 0;
          z-index: -1;
          border-radius: 0.25rem;
          transition: all 0.3s linear 0s;
          }
          .schedule-table table tbody td .hover {
          position: absolute;
          left: 50%;
          top: 50%;
          width: 120%;
          height: 120%;
          transform: translate(-50%, -50%) scale(0.8);
          z-index: 99;
          background: #86d4f5;
          border-radius: 0.25rem;
          padding: 25px 0;
          visibility: hidden;
          opacity: 0;
          transition: all 0.3s linear 0s;
          }
          .schedule-table table tbody td.active:hover .hover {
          transform: translate(-50%, -50%) scale(1);
          visibility: visible;
          opacity: 1;
          }
          .schedule-table table tbody td.day:hover {
          background: #86d4f5;
          color: #fff;
          border: 1px solid #86d4f5;
          }
          @media screen and (max-width: 1199px) {
          .schedule-table {
          display: block;
          width: 100%;
          overflow-x: auto;
          }
          .schedule-table table thead th {
          padding: 25px 40px;
          }
          .schedule-table table tbody td {
          padding: 20px;
          }
          .schedule-table table tbody td.active h4 {
          font-size: 18px;
          }
          .schedule-table table tbody td.active p {
          font-size: 15px;
          }
          .schedule-table table tbody td.day {
          font-size: 20px;
          }
          .schedule-table table tbody td .hover {
          padding: 15px 0;
          }
          .schedule-table table tbody td .hover span {
          font-size: 17px;
          }
          }
          @media screen and (max-width: 991px) {
          .schedule-table table thead th {
          font-size: 18px;
          padding: 20px;
          }
          .schedule-table table tbody td.day {
          font-size: 18px;
          }
          .schedule-table table tbody td.active h4 {
          font-size: 17px;
          }
          }
          @media screen and (max-width: 767px) {
          .schedule-table table thead th {
          padding: 15px;
          }
          .schedule-table table tbody td {
          padding: 15px;
          }
          .schedule-table table tbody td.active h4 {
          font-size: 16px;
          }
          .schedule-table table tbody td.active p {
          font-size: 14px;
          }
          .schedule-table table tbody td .hover {
          padding: 10px 0;
          }
          .schedule-table table tbody td.day {
          font-size: 18px;
          }
          .schedule-table table tbody td .hover span {
          font-size: 15px;
          }
          }
          @media screen and (max-width: 575px) {
          .schedule-table table tbody td.day {
          min-width: 135px;
          }
          }
          </style>
            
        </section>


    </main><!-- End #main -->
@endsection
