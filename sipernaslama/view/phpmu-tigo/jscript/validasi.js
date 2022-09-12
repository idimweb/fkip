function validasi(form){
	if (form.nama_komentar.value == ""){ alert("Anda belum mengisikan Nama"); form.nama_komentar.focus(); return (false); }							
	if (form.email.value == ""){ alert("Anda belum mengisikan Email"); form.email.focus(); return (false); }									
	if (form.isi_komentar.value == ""){ alert("Anda belum menuliskan Komentar"); form.isi_komentar.focus(); return (false); }																		
return (true);
}

function validasicontact(form){
	if (form.nama.value == ""){ alert("Anda belum mengisikan Nama"); form.nama.focus(); return (false); }							
	if (form.email.value == ""){ alert("Anda belum mengisikan Email"); form.email.focus(); return (false); }									
	if (form.pesan.value == ""){ alert("Anda belum menuliskan Pesan"); form.pesan.focus(); return (false); }																		
return (true);
}
