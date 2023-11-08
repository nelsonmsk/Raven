@extends('emails.Index')

@section('body')

    <div class="col-md-10 col-md-offset-1 bg-white">
        <h3 class="text-center bold">Order Shipment Email Preview </h3>
        <hr>
		<form class="form-horizontal singleForm" id="mailable-form2" method="post" action="emails" data-parsley-validate>
			<div class="form-group">
					<input type="hidden" value="{{csrf_token()}}" name="_token" />	
					<input type="hidden" id="id" value="{{$mail['id']}}" name="id" />						
					<input type="hidden" id="message" value="{{$mail['message']}}" name="message" />					
					<input type="hidden" id="status" value="{{$mail['status']}}" name="status" />			
					<input type="hidden" id="image" value="{{$mail['image']}}" name="image" />	
					<input type="hidden" id="imagePath" value="{{$mail['imagePath']}}" name="imagePath" />					
				<label for="name" class="col-sm-2 control-label">To:</label>
				<div class="col-sm-10">
				  <input id="to" type="email"  class="form-control" name="to" value="{{$mail['to']}}"  required />
				</div>
			</div>
			<div class="form-group">
				<label for="cc" class="col-sm-2 control-label">Cc:</label>
				<div class="col-sm-10">
				  <input id="cc" type="email"  class="form-control" name="cc" value="{{$mail['cc']}}"  required />
				</div>
			</div>
			<div class="form-group">
				<label for="subject" class="col-sm-2 control-label">Subject:</label>
				<div class="col-sm-10">
				  <input id="subject" type="text"  class="form-control" name="subject" value="{{$mail['subject']}}"  required />
				</div>
			</div>
         <div class="p-top-30  panel" id="figures" data-stellar-background-ratio="0.1">
            <div class="container wow fadeIn" data-wow-delay="0.5s">
               <div class="row">
                  <div class="col-md-8 col-sm-9 center-block">
                     <div class="heading text-left">
                        <h3 class="light-font">Hi,  {{$order->cName ? $order->cName : 'Customer' }}</h3>
                        <p>{{$data['message']}}</p>
                        <p class="light-font">{{$order->cName ? 'Thank you for your order. Please see Order details below!' : 'Thank you for your time. We would like to hear more feedback from you'}}</p>
                     </div>
					 <br/>

						 <h2 class="text-center"><i class="fa fa-arrow-down rounded"></i></span></h2>					 
                  </div>
                  <!-- /.col --> 
               </div>
            </div>
         </div>	
				
			
			<div class="text-center">
			@if ($order->cName)
				<div class="table-responsive">
					<table class="table table-condensed table-bordered  table-striped" >
						<thead>
							<tr>
							  <th>ID</th>
							  <th>Name</th>
							  <th>Address</th>
							  <th>Phone</th>
							  <th>Items Ordered</th>
							  <th>Total</th>
							  <th>Sp.Request</th>
							  <th>Order Date</th						  
							</tr>
						</thead>
						<tbody>

							@if($order)
							<tr>
								<td>{{$order->id}}</td>
								<td>{{$order->cName}}</td>
								<td>{{$order->cPhone}}</td>
								<td>{{$order->cAddress}}</td>
								<td>{{$order->items}}</td>
								<td>{{$order->subTotal}}</td>
								<td>{{$order->sRequest}}</td>							
								<td>{{$order->created_at}}</td>				
							</tr>
							@else
							<tr>
							<td colspan="10"><p class="errortext">No record present</p></td>
							</tr>

							@endif
						</tbody>
						<tfoot>
							<tr>

							</tr>
						</tfoot>
					</table>
					
					
				</div>
				@endif
               <div class="row">
                  <div class="col-md-8 col-sm-9 center-block">
                     <div class="heading text-left">
							<p class="tr-dark">Regards,</p>
						<br/>
							<p class="tr-dark ">{{$appdefaults->username}}</p>						
						<div><i class="light-font">							
							<p class="tr-dark">{{$appdefaults->companyName}}</p>
							<p class="tr-dark">{{$appdefaults->address}}</p>
							<a href="{{$appdefaults->email}}" class="tr-dark text-primary">{{$appdefaults->email}}</a>	</i>						
						</div>
                     </div>					 
                  </div>
                  <!-- /.col --> 
               </div>				
			
				<!-- Footer logo and social media button -->
				<div class="logo-social-area p-top-40 p-bot-20 panel bg-light">
					<div class="container text-center">
						<a class="logo logo-footer"  href="#">
							<p class="logo-title">{{$appdefaults->appTitle}}</p>
						</a>
						<div class="socials">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-youtube-play"></i></a>
							<a href="#"><i class="fa fa-vimeo"></i></a>
						</div>
					</div>
				</div>
			</div>					
				<div id="b-element" class="form-group">
					<div class="col-sm-offset-2 col-sm-10">	
					  <button type="submit" class="btn btn-success btn-lg col-sm-5" id="save-btn" name="send">Send</button>					
					  <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel</a>
					</div>
				</div>
			</div>

        </form>
		
    </div>	
@endsection
