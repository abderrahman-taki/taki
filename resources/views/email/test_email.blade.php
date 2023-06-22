<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Booking Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        body {
        margin: 0;
        font-family: 'Raleway';
        font-size: 16px;
        line-height: 1.8em;
        }

        a {
        color: #1C9C94;
        text-decoration: none;
        }

        a:hover {
        opacity: 0.5;
        }

        article {
        padding:0 1em;
        }

        section{
        margin: 1em;
        padding: 1em;
        }

        header, main, footer {
        margin: 0 auto;
        }

        header {
        padding: 2em;
        text-align: center;
        background-image: url('./img/bg.jpg');
        background-size: cover;
        background-position: fixed;
        color: white;
        }

        header section {
        margin: 0 auto;
        max-width: 640px;
        }

        header img {
        border-radius: 50%;
        max-width: 150px;
        }

        h1 {
        text-transform: uppercase;
        margin: 1em 0;
        }

        h3 {
        text-transform: uppercase;
        }

        h3, h4 {
        font-weight: bold;
        }

        main {
        max-width: 1140px;
        }

        main section:not(:last-child) {
        border-bottom: 1px solid #ccc;
        }

        .fab {
        border: 1px solid white;
        border-radius: 50%;
        font-size: 1.5em;
        width: 1.5em;
        height: 1.5em;
        line-height: 1.5em;
        margin: 5px;
        text-align: center;
        }

        a .fab {
        color: white;
        }

        .course, .skills {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        }

        .course .title {
        color: #FF4A52;
        -ms-flex: 0 0 33.3%;
        flex: 0 0 33.3%;
        max-width: 33%;
        }

        .course .descrition {
        -ms-flex: 0 0 66.6%;
        flex: 0 0 66.6%;
        max-width: 66.6%;
        }

        .course .descrition p {
        padding-left: 1em;
        }

        .skills .column {
        -ms-flex: 0 0 50%%;
        flex: 0 0 50%;
        max-width: 50%;
        }

        .skills .column ul, ul.job-description {
        list-style-type: none;
        }

        .skills .column ul > li:before {
        content: "►";
        padding-right: 0.5em;
        color: #FF4A52;
        }

        .school, .job-title {
        text-transform: capitalize;
        }

        .school span, .job-title span {
        color: #889499;
        text-decoration: underline;
        }

        ul.job-description li:before{
        content: "✔";
        padding-right: 0.5em;
        color: #FF4A52;
        }

        footer {
        padding: 1em 1.5em;
        background: #040E27;
        color: white;
        text-align: right;
        }

        @media only screen and (max-width: 768px) {
        .course {
            display: block;
        }

        .course .title, .course .descrition {
            max-width: 100%;
        }
        }

        @media only screen and (max-width: 576px) {
        .skills {
            display: block;
        }

        .skills .column {
            max-width: 100%;
        }

        footer {
            text-align: center;
        }
        }
    </style>
</head>

<body style="width:50%">
  <header style="background-color:#040E27;height:80px;">
    <div style="float: left;">
        North Explorer
    </div>
    <div style="float: right">
        <span>Contact:<br>
            Email:  northexplorer.morocco@gmail.com<br>
            Phone: +212 65 13 757 41</span>
    </div>
  </header>
  <main>

    <h3 style="text-align: center;color:#FF4A52">Booking Details</h3>
    <p  style="text-align: center;">
      Hi,{{$client->prenom}} {{$client->nom}}
      Here you can find your booking details.
    </p>
    <section>
      <h3>Tour Details</h3>
      <article class='course'>
        <div class='title'>
          <h4>Tour</h4>
        </div>
        <div class="descrition">
          <p>{{$tour->nom}}</p>
        </div>
      </article>
      <article class='course'>
        <div class='title'>
          <h4> Departure Date</h4>
        </div>
        <div class="descrition">
          <p>{{$tour->date_debut}}</p>
        </div>
      </article>
      <article class='course'>
        <div class='title'>
          <h4>End Date</h4>
        </div>
        <div class="descrition">
          <p>{{$tour->date_fin}}</p>
        </div>
      </article>
      <article class='course'>
        <div class='title'>
          <h4>Difficulty</h4>
        </div>
        <div class="descrition">
          <p> {{$tour->difficulte}} </p>
        </div>
      </article>
      <article class='course'>
        <div class='title'>
          <h4>Description</h4>
        </div>
        <div class="descrition">
          <p>
            {{$tour->description}}
          </p>
        </div>
      </article>
    </section>
    <section>
        <h3>Booking Details</h3>
        <article class='course'>
          <div class='title'>
            <h4>Place Number</h4>
          </div>
          <div class="descrition">
            <p>{{$reservation->nbr_places_demande}}</p>
          </div>
        </article>
        <article class='course'>
          <div class='title'>
            <h4> Message</h4>
          </div>
          <div class="descrition">
            <p>
                {{$reservation->message}}
            </p>
          </div>
        </article>
        <article class='course'>
          <div class='title'>
            <h4>Total Price</h4>
          </div>
          <div class="descrition">
            <p>{{$reservation->prix_total}}</p>
          </div>
        </article>

        <article class='course'>
          <div class='title'>
            <h4>Price payed</h4>
          </div>
          <div class="descrition">
            <p>
                {{$reservation->prix_total/2}}
            </p>
          </div>
        </article>
      </section>

  </main>
  <footer>
    <p> If there is any question, don't hesistate and contact us!</p>
  </footer>
</body>
</html>