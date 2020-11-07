@extends('layouts.app')

@section('content')
 <style>
     body {
    background-color: white;
}

.db-bk-color-one {
    background-color: #f8f8f8;
}

.plan-text {
    font-family: calibri;
    font-size: 15px;
    text-align: left;
    color: black;
    font-size: 15px;
}

.plan-div {
    padding: 4%;
    height: 100px;
}

.price-text {
    font-size: 12px;
}

.plan-name {
    font-size: 14px;
    margin-bottom: 30px;
}

.db-padding-btm {
    padding-bottom: 10px;
}

.db-button-color-square {
    color: #fff;
    background-color: rgba(0, 0, 0, 0.50);
    border: none;
    border-radius: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
}

    .db-button-color-square round:hover {
        color: #fff;
        background-color: rgba(0, 0, 0, 0.50);
        border: none;
    }

.db-wrapper {
    padding-left: 2%;
}

.db-pricing-eleven {
    margin-bottom: 30px;
    margin-top: 50px;
    text-align: center;
    box-shadow: 0 0 5px rgba(0, 0, 0, .5);
    color: #fff;
    line-height: 15px;
}


.round {
    border-radius: 24px;
}


/*.db-pricing-eleven .price {
        background-color: #68ceee;
        padding: 20px 20px 20px 20px;
        font-size: 30px;
        font-weight: 900;
        color: #FFFFFF;
    }

        .db-pricing-eleven .price small {
            color: #B8B8B8;
            display: block;
            font-size: 12px;
            margin-top: 22px;
        }

    .db-pricing-eleven .type {
        background-color: #52E89E;
        padding: 50px 20px;
        font-weight: 900;
        text-transform: uppercase;
        font-size: 30px;
    }*/

.db-pricing-eleven .pricing-footer {
    padding: 20px;
}

.db-attached > .col-lg-4,
.db-attached > .col-lg-3,
.db-attached > .col-md-4,
.db-attached > .col-md-3,
.db-attached > .col-sm-4,
.db-attached > .col-sm-3 {
    padding-left: 0;
    padding-right: 0;
}

.db-pricing-eleven.popular {
    margin-top: 10px;
}

    .db-pricing-eleven.popular .price {
        padding-top: 80px;
    }

#index-para {
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 400px;
    left: 900px;
    width: 100px;
    height: 50px;
    background-color: chartreuse;
    border-radius: 0;
}

#index-p {
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 20px;
    left: 690px;
    width: 100px;
    height: 0;
    font-size: 18px;
    font-style: normal;
    color: darkgray;
}

.right-div {
    position: absolute;
    margin: auto;
    top: 600px;
    right: 0;
    bottom: 0;
    left: 700px;
    width: 100px;
    height: 50px;
    background-color: none;
    border-radius: 0;
}

input[name="Quantity"] {
    width: 25%;
}
body {
    padding-top: 50px;
    padding-bottom: 20px;
}

/* Set padding to keep content from hitting the edges */
.body-content {
    padding-left: 15px;
    padding-right: 15px;
}

/* Override the default bootstrap behavior where horizontal description lists 
   will truncate terms that are too long to fit in the left column 
*/
.dl-horizontal dt {
    white-space: normal;
}

/* Set width on the form input elements since they're 100% wide by default */
input,
select,
textarea {
    max-width: 280px;
}

 </style>
    <div class="container body-content">

    <div class="form-group" style="padding: 50px 10px;">
        <div class="body-content">
            <div class="row">
                <form  action="/pay" method="POST">
                    @csrf
                    <div class="col-xs-4">
                        <img src="{{asset("dist/img/photo3.jpg")}}" class="col-xs-6" />
                        <div class="col-xs-6 text-left">
                            <input type="hidden" name="ItemId" value="001" />
                            <input type="hidden" name="ItemName" value="After the rain book" />
                            <input type="hidden" name="UnitPrice" value="1">
                            <input type="hidden" name="DeliveryFee" value="0.5" />
                            <input type="hidden" name="Discount" value="0" />
                            <input type="hidden" name="Tax1" value="1.50" />
                            <input type="hidden" name="Tax2" value="0" />
                            <input type="hidden" name="HandlingFee" value="0">
                            <b style="font-size: 1.2em;" class="text-primary">After the rain book</b><br />
                            <span>Qty: <input type="text" value="1" name="Quantity" /></span><br />
                            <span>ETB 1.00</span>
                            <br /><br />
                            <button type="submit" value="submit" class="btn btn-success" style="font-size: 0.9em;">Pay with YenePay</button>
                        </div>
                    </div>
                </form>
                <form method="post" action="process.php">
                    <div class="col-xs-4">
                        <img src="{{asset("dist/img/photo4.jpg")}}" class="col-xs-6" />
                        <div class="col-xs-6 text-left">
                            <input type="hidden" name="ItemId" value="002" />
                            <input type="hidden" name="ItemName" value="Sample Item 2" />
                            <input type="hidden" name="UnitPrice" value="1050">
                            <input type="hidden" name="DeliveryFee" value="50" />
                            <input type="hidden" name="Discount" value="10" />
                            <input type="hidden" name="Tax1" value="7.50" />
                            <input type="hidden" name="Tax2" value="0" />
                            <input type="hidden" name="HandlingFee" value="0">
                            <b style="font-size: 1.2em;" class="text-primary">Sample Item 2</b><br />
                            <span>Qty: <input type="text" value="1" name="Quantity" /></span><br />
                            <span>ETB 1,050.00</span>
                            <br /><br />
                            <button type="submit" value="submit" class="btn btn-success" style="font-size: 0.9em;">Pay with YenePay</button>
                        </div>
                    </div>
                </form>
                <form method="post" action="process.php">
                    <div class="col-xs-4">
                        <img src="{{asset("dist/img/photo3.jpg")}}" class="col-xs-6" />
                        <div class="col-xs-6 text-left">
                            <input type="hidden" name="ItemName" value="Sample Item 3" />
                            <input type="hidden" name="UnitPrice" value="3000">
                            <input type="hidden" name="DeliveryFee" value="50" />
                            <input type="hidden" name="Discount" value="10" />
                            <input type="hidden" name="Tax1" value="7.50" />
                            <input type="hidden" name="Tax2" value="0" />
                            <input type="hidden" name="HandlingFee" value="0">
                            <b style="font-size: 1.2em;" class="text-primary">Sample Item 3</b><br />
                            <span>Qty: <input type="text" value="1" name="Quantity" /></span><br />
                            <span>ETB 3,000.00</span>
                            <br /><br />
                            <button type="submit" value="submit" class="btn btn-success" style="font-size: 0.9em;">Pay with YenePay</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection