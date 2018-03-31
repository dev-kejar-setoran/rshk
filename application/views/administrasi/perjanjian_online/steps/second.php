<div class="ui top attached segment">
	<div class="ui grid field">
		<div class="six wide column center-label">
			<label class="bold">Cari Nomor MR Pasien</label>
		</div>
		<div class="five wide column">
			<div class="field">
				<div class="ui action icon input">
					<input type="text" name="Nomor MR Pasien">
					<button class="ui teal right labeled icon button">
						<i class="search icon"></i>
						Cari
					</button>
				</div>
			</div>
		</div>
	</div>

	<div class="ui divider"></div>

	<div class="ui grid field">
		<div class="six wide column center-label">
			<label class="bold">Nama Pasien</label>
		</div>
		<div class="ten wide column">
			<div class="field">
				<input type="text" name="nama" placeholder="Nama lengkap pasien">
			</div>
		</div>
	</div>

	<div class="ui grid field">
		<div class="six wide column">
			<label class="bold">Jenis Kelamin</label>
		</div>
		<div class="five wide column">
			<div class="field">
				<div class="ui radio checkbox">
					<input type="radio" name="gender">
					<label>Laki-laki</label>
				</div>
			</div>
		</div>
		<div class="five wide column">
			<div class="field">
				<div class="ui radio checkbox">
					<input type="radio" name="gender">
					<label>Perempuan</label>
				</div>
			</div>
		</div>
	</div>

	<div class="ui grid field">
		<div class="six wide column center-label">
			<label class="bold">Tanggal Lahir Pasien</label>
		</div>
		<div class="four wide column">
			<div class="field">
				<div class="ui icon date input">
					<input type="text" name="tgl_lahir" placeholder="dd/mm/yyyy">
					<i class="calendar icon"></i>
				</div>
			</div>
		</div>
	</div>

	<div class="ui grid field">
		<div class="six wide column center-label">
			<label class="bold">Kewarganegaraan</label>
		</div>
		<div class="four wide column">
			<select name="kewarganegaraan" id="" class="ui dropdown selection">
				<option value="">Pilih kewarganegaraan</option>
				<option value="1">WNA</option>
				<option value="2">WNI</option>
			</select>
		</div>
	</div>

	<div class="ui grid field">
		<div class="six wide column">
		</div>
		<div class="five wide column">
			<div class="ui checkbox">
				<input type="checkbox" name="asuransi">
				<label>Memiliki asuransi</label>
			</div>

		</div>
	</div>

</div>
<div class="ui bottom attached segment">
	<div class="ui two columns grid">
		<div class="left aligned column">
			<div class="ui labeled icon first button"><i class="left arrow icon"></i> Kembali</div>
		</div>
		<div class="right aligned column">
			<div class="ui blue right labeled icon third button"><i class="right arrow icon"></i> Selanjutnya</div>
		</div>
	</div>
</div>