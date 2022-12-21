@extends('layouts.app')

@section('content')

<head>
    <style>
        #titleBox1{
            /* border: 1px solid brown; */
            margin: 1rem;
        }
        #relatedLink1Box{
            /* border: 1px solid blue; */
            margin: 1rem;
        }
        #relatedImageBox1{
            /* border: 1px solid yellow; */
            display: block; 
            text-align: center; 
            max-width: 55%; 
            margin: 1em;
        }
        #relatedImage1{
            width: 100%; 
            height: 100%;
        }
        #relatedText1{
            display: block; 
            text-align: center;
            /* border: 1px solid red;  */
            margin-top: auto;
            margin-bottom: auto;
        }

        #titleBox2{
            /* border: 1px solid brown; */
            margin: 1rem;
        }
        #relatedLink2Box{
            /* border: 1px solid blue; */
            margin: 1rem;
        }
        #relatedImageBox2{
            /* border: 1px solid yellow;  */
            display: block; 
            text-align: center; 
            margin: 1em;
        }
        #relatedImage2{
            width: 100%; 
            height: 100%;
        }
        #relatedText2{
            display: block; 
            text-align: center;
            /* border: 1px solid red;  */
            max-width: 55%; 
            margin-top: auto;
            margin-bottom: auto;
        }
        
        #titleBox3{
            /* border: 1px solid brown; */
            margin: 1rem;
        }
        #relatedLinkBox3{
            /* border: 1px solid blue;  */
            margin: 1rem;
        }
        #relatedImageBox3{
            /* border: 1px solid yellow;  */
            display: block; 
            text-align: center; 
            margin: 1em;
        }
        #relatedImage3{
            width: 100%; 
            height: 100%;
        }
        #relatedText3{
            display: block; 
            text-align: center;
            /* border: 1px solid red;  */
            margin-top: auto;
            margin-bottom: auto;
        }
        #subLink{
        color: #CD853F;
        font-weight: bold;
        }
        #subLink:hover{
            text-decoration: none;
            color: #D2B48C;
        }
        #subLink:active{
            color: #00FF7F;
            text-shadow: 0.5px 0.5px 0.5px black;
        }
    </style>
</head>

<div class="container-fluid">

    <div class="row justify-content-center p-5">
        <h3 class="font-weight-bold"> Related Links </h3>
    </div>
    <hr class="light">

    <div class="justify-content-start p-3" id="titleBox1">
        <div>
            <h3>
                <a class="font-weight-bold p-3" href="https://strathmore.edu" title="Strathmore University Website" target="_blank" style="color:#A0522D">1. Strathmore Univeristy Website</a>
            </h3>
        </div>
    </div>

    <div class="row justify-content-start" id="relatedLink1Box">
        <div class="col order-1" id="relatedImageBox1">
            <a href="https://strathmore.edu" title="Strathmore University Website" target="_blank">
                <img class="img-fluid" id="relatedImage1" style="border: 3px solid black" src="/images/su_main.png">
            </a>
        </div>

        <div class="col order-2" id="relatedText1">
            <p class="lead" style="font-size: 1.02rem"> 
                Strathmore University is a chartered university based in Nairobi, Kenya. Strathmore College was started in 1961, as the first multi-racial, multi-religious advanced-level sixth form college offering science and arts subjects, by a group of professionals who formed a charitable educational trust. 
                <br><br>
                Click <a id="subLink" href="https://strathmore.edu" target="_blank">Here </a>to view it.
            </p>
        </div>
    </div>

    <div class="row justify-content-end mt-5 p-3" id="titleBox2">
        <div>
            <h3>
              <a class="font-weight-bold p-3" href="https://elearning.strathmore.edu" title="Strathmore University Website" target="_blank" style="color:#A0522D">2. Strathmore Univeristy E-learning</a>
            </h3>
        </div>
    </div>

    <div class="row justify-content-start" id="relatedLink2Box">
        <div class="col order-2" id="relatedImageBox2">
            <a href="https://elearning.strathmore.edu" title="Strathmore University E-Learning" target="_blank">
                <img class="img-fluid" style="border: 3px solid black" src="/images/su_elearning.png" id="relatedImage2">
            </a>
        </div>
        <div class="col order-1" id="relatedText2">
            <p class="lead" style="font-size: 1.02rem"> 
                Strathmore University's mission is to provide all-round quality education in an atmosphere of freedom and responsibility; excellence in teaching, research and scholarship; ethical and social development; and service to society. With their e-learning system, achieving this is a walk in the park.
                <br><br>
                Click <a id="subLink" href="https://elearning.strathmore.edu" target="_blank">Here </a>to view it.
            </p>
        </div>
    </div>

    <div class="row justify-content-start mt-5 p-3" id="titleBox3">
        <div>
            <h3>
              <a class="font-weight-bold p-3" href="https://su-sso.strathmore.edu/susams" title="Strathmore University Website" target="_blank" style="color:#A0522D">3. Strathmore Univeristy AMS</a>
            </h3>
        </div>
    </div>

    <div class="row justify-content-start" id="relatedLinkBox3">
        <div class="col order-1" id="relatedImageBox3">
            <a href="https://su-sso.strathmore.edu/susams" title="Strathmore University AMS" target="_blank">
                <img class="img-fluid" style="border: 3px solid black" src="/images/su_ams.png" id="relatedImage3">
            </a>
        </div>
        <div class="col order-2" id="relatedText3">
            <p class="lead" style="font-size: 1.02rem"> 
                Strathmore Academic Module System (AMS) comes to the rescuse for Stratizens in ensuring that they get their course work marks and exam grades in a timely and organised manner. Powered by Apereo Central Authentication Service, it provides brilliant features for organisation, making items easily accessible.
                <br><br>
                Click <a id="subLink" href="https://su-sso.strathmore.edu/cas-prd/login?service=https%3A%2F%2Fsu-sso.strathmore.edu%2Fsusams%2Fservlet%2Fedu%2Fstrathmore%2Fams%2Fsusams%2FInit.html" target="_blank"> Here </a>to view it.
            </p>
        </div>
    </div>
</div>
    
@endsection