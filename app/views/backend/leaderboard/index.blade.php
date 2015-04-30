
	<div class="col-md-12">
	<br>	
	<div class="table-responsive">
	<h1 class="text-center">Leader Board</h1>
	<h4 class="text-center">Bergabunglah di Smart Moms Club, Jadilah Smart Moms yang Aktif,
	                        Kumpulkan Poin Sebanyaknya dan Dapatkan Hadia Yang menarik.</h4>
		<table class="table " style="margin-auto;">
			<tr style="background:#a5b4e5;"> 
				<td style="border:0px;">No</td>
				<td style="border:0px;">Nama</td>
				<td style="border:0px;">Poin</td>
			</tr>		
			<tr class="alert-success"> 
				<td style="border:0px;">1</td>
				<td style="border:0px;">Ibu Rini</td>
				<td style="border:0px;">-</td>
			</tr>
			<tr class="alert-success"> 
				<td style="border:0px;">2</td>
				<td style="border:0px;">Ibu Maya</td>
				<td style="border:0px;">-</td>
			</tr>			
			<tr class="alert-success"> 
				<td style="border:0px;">3</td>
				<td style="border:0px;">Ibu Andi</td>
				<td style="border:0px;">-</td>
			</tr>						
			<tr class="alert-success"> 
				<td style="border:0px;">....</td>
				<td style="border:0px;">....</td>
				<td style="border:0px;">....</td>
			</tr>
			@if(isset($profile))
			<tr style="background:#A5B4E5;"> 
				<td style="border:0px;">20</td>
				<td style="border:0px;">{{$profile->nama}}</td>
				<td style="border:0px;">{{$profile->poin}}</td>
			</tr>			
			@endif
		</table>
<div class="col-md-12 padding-margin-o">
<p style="padding:20px; background:#A5B4E5;">
Mari Kumpulkan Poin Smart Moms Sebanyak Banyaknya dan Dapatkan hadia menarik lainnya.
</p>
</div>
	</div>	
	</div>