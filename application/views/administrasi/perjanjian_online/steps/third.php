<div class="ui top attached segment">
	<div class="ui grid">
		<div class="four wide column">
			<div class="ui segment">
				<h4 class="ui title">Ringkasan Data Pasien</h4>
				<div class="field">
					<label for="">Nama Pasien</label>
					<div class="ui transparent input">
						<input type="text" value="Alek Patel" readonly>
					</div>
				</div>
				<div class="field">
					<label for="">Jenis Kelamin</label>
					<div class="ui transparent input">
						<input type="text" value="Laki-laki" readonly>
					</div>
				</div>
				<div class="field">
					<label for="">Tanggal Lahir</label>
					<div class="ui transparent input">
						<input type="text" value="12/12/1988" readonly>
					</div>
				</div>
				<div class="field">
					<label for="">Kewarganegaraan</label>
					<div class="ui transparent input">
						<input type="text" value="WNI" readonly>
					</div>
				</div>
				<div class="field">
					<label for="">Asuransi?</label>
					<div class="ui transparent input">
						<input type="text" value="Ya" readonly>
					</div>
				</div>
				<a href="#" class="ui teal fluid right icon labeled button">
					Lihat Riwayat Perjanjian
					<i class="clipboard icon"></i>
				</a>
			</div>
		</div>
		<div class="twelve wide column">
			<div class="ui segment">
				<h4 class="ui title">Cek Dokter</h4>
				<div class="ui three fields">
					<div class="field">
						<select name="filter[spesialisasi]" id="" class="ui dropdown selection">
							<option value="">Pilih Spesialisasi</option>
							<option value="1">Spesialisasi A</option>
							<option value="2">Spesialisasi B</option>
						</select>
					</div>
					<div class="field">
						<div class="ui selection dropdown">
							<input type="hidden" name="user">
							<i class="dropdown icon"></i>
							<div class="default text">Pilih dokter...</div>
							<div class="menu">
								<div class="item" data-value="dr. AMIN TJUBANDI , Sp.BTKV">
									dr. AMIN TJUBANDI , Sp.BTKV
								</div>
								<div class="item" data-value="dr ADE MEIDIAN AMBARI , SpJp">
									dr ADE MEIDIAN AMBARI , SpJp
								</div>
								<div class="item" data-value="DR.dr. AMILIANA MARDIANI , Sp.JP(K)">
									DR.dr. AMILIANA MARDIANI , Sp.JP(K)
								</div>
							</div>
						</div>
					</div>
					<div class="field">
						<select name="field[hari]" id="" class="ui dropdown selection">
							<option value="">Pilih Hari</option>
							<option value="1">Senin</option>
							<option value="2">Selasa</option>
							<option value="3">Rabu</option>
							<option value="4">Kamis</option>
							<option value="5">Jumat</option>
							<option value="6">Sabtu</option>
							<option value="7">Minggu</option>
						</select>
					</div>
				</div>
			</div>
			<div class="ui top attached segment">
				<div class="ui grid">
					<div class="six wide column">
						<img class="ui image" src="../../../img/avatar04.png" style="height: 100%; object-fit: cover">
					</div>
					<div class="ten wide column">
						<h3>dr. AMIN TJUBANDI
							<br>
							<small>Sp.BTKV</small>
						</h3>
						<table class="ui celled center aligned table">
							<thead>
								<tr>
									<th>Hari</th>
									<th>Poli</th>
									<th>Jam Praktek</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Senin</td>
									<td>Poli A</td>
									<td>17:00 - 19:00</td>
								</tr>
								<tr class="active">
									<td>Rabu</td>
									<td>Poli A</td>
									<td>17:00 - 19:00</td>
								</tr>
								<tr>
									<td>Kamis</td>
									<td>Poli A</td>
									<td>17:00 - 19:00</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="ui bottom attached segment">
				<div class="ui grid field">
					<div class="six wide column center-label">
						<label class="bold">Kuota</label>
					</div>
					<div class="two wide column">
						<div class="field">
							<div class="ui transparent labeled input">
								<input type="text" name="kuota" value="4">
								<span class="ui green label">
									<i class="check icon"></i> Tersedia
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="ui grid field">
					<div class="six wide column center-label">
						<label class="bold">Tanggal Perjanjian</label>
					</div>
					<div class="six wide column">
						<div class="field">
							<div class="ui icon date input">
								<input type="text" name="tgl_perjanjian" placeholder="dd/mm/yyyy">
								<i class="calendar icon"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="ui grid field">
					<div class="six wide column center-label">
						<label class="bold">Waktu Perkiraan Perjanjian</label>
					</div>
					<div class="six wide column">
						<div class="field">
							<div class="ui icon date input">
								<input type="text" name="tgl_perjanjian" placeholder="dd/mm/yyyy">
								<i class="calendar icon"></i>
							</div>
						</div>
					</div>
					<div class="four wide column">
						<div class="field">
							<div class="ui icon time input">
								<input type="text" name="tgl_perjanjian" placeholder="hh:mm">
								<i class="clock icon"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="ui grid field">
					<div class="six wide column center-label">
						<label class="bold">Poli Tujuan</label>
					</div>
					<div class="ten wide column">
						<div class="field">
							<select name="poli_tujuan" id="" class="ui selection dropdown">
								<option value="">Pilih poli</option>
								<option value="1">Poli A</option>
								<option value="2">Poli B</option>
								<option value="3">Poli C</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="ui bottom attached segment">
	<div class="ui two columns grid">
		<div class="left aligned column">
			<div class="ui labeled icon second button"><i class="left arrow icon"></i> Kembali</div>
		</div>
		<div class="right aligned column">
			<div class="ui blue right labeled icon finish button" onclick="openConfirmationModal()"><i class="send icon"></i> Kirim</div>
		</div>
	</div>
</div>