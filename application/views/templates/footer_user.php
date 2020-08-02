<footer class="sticky-footer bg-white" style="border-top: 1px solid #e6eaee; margin-top: 120px;">
    <div class="container footer">
        <div class="row">
            <div class="col">
                <h5><b>Batik Mulia</b></h5>
                <p>Batik Mulia atau Batik Dermayon memiliki ciri khas tersendiri bila dibandingkan dengan batik-batik lain di tanah air, seperti batik dari Pekalongan, Jogjakarta, Solo, atau bahkan batik Trusmi dari Cirebon.</p>
            </div>
            <div class="col">
                <h5><b>Batik Mulia Paoman</b></h5>
                <p>Jl. Siliwangi No.10, Paoman, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat 45211</p>
                <p>Telepon : 0858-0689-9992 / 0822-1874-3312</p>
                <p>Email : <span>batikmulia@gmail.com</span></p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="copyright text-center my-auto mt-5">
                    <span>Copyright &copy; Batik Mulia <?= date('Y'); ?></span>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- datatables -->
<script src="<?= base_url('assets'); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>
<!-- <script src="<?= base_url('assets'); ?>/js/main.js"></script> -->
<script src="<?= base_url('assets'); ?>/js/sweetalert2.all.min.js"></script>

<script>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal.fire({
            title: 'Produk ',
            text: 'Berhasil ' + flashData,
            icon: 'success'
        });
    }
</script>

<script>
    $(function() {
        $.get("<?= site_url('user/get_provinsi') ?>", {}, (response) => {
            let output = '';
            let provinsi = response.rajaongkir.results
            console.log(response)

            provinsi.map((val, i) => {
                output += `<option value="${val.province_id}" >${val.province}
		
				</option>`
            })
            $('.provinsi').html(output)

        })
    });

    function get_kota() {
        let id_provinsi = $(`#provinsi`).val();
        $.get("<?= site_url('user/get_kota/') ?>" + id_provinsi, {}, (response) => {
            let output = '';
            let kota = response.rajaongkir.results
            console.log(response)

            kota.map((val, i) => {
                output += `<option value="${val.city_id}" >${val.city_name}
				
					</option>`
            })
            $(`#kota`).html(output)

        })
    }

    function get_ongkir() {
        let berat = $('#totalberat').val();
        let asal = $('#asal').val();
        let tujuan = $('#tujuan').val();
        let kurir = $('#ekspedisi').val();
        let output = '';

        $.get("<?= site_url('user/get_biaya/') ?>" + `${asal}/${tujuan}/${berat}/${kurir}`, {}, (response) => {
            console.log(response);
            let biaya = response.rajaongkir.results

            console.log(biaya)

            biaya.map((val, i) => {
                for (var i = 0; i < val.costs.length; i++) {
                    let jenis_layanan = val.costs[i].service
                    val.costs[i].cost.map((val, i) => {
                        output += `<option value="${val.value}" id="servis" name="servis" onclick="tampil()" >${jenis_layanan} - Rp.${val.value} ${val.etd} hari  </option>`
                    })
                }
            })
            $(`#service`).html(output)

        })
    }

    function toDuit(number) {
        var number = number.toString(),
            duit = number.split('.')[0],
            duit = duit.split('').reverse().join('')
            .replace(/(\d{3}(?!$))/g, '$1.')
            .split('').reverse().join('');
        return 'Rp. ' + duit;
    }

    function hitungtotal() {
        let ongkir = $('#service').val();
        let total = $('#total').val();
        let bayar = (parseFloat(ongkir) + parseFloat(total));

        $(`#totalbayar`).html(toDuit(bayar));
        $(`#ongkoskirim`).html(toDuit(ongkir));
        $(`#ongkir`).val(ongkir);
        $(`#bayar`).val(bayar);
        tampil();
    }

    function tampil() {
        $('#btnsimpan').show();
    }
</script>

<!-- cek ongkir -->
<!-- <script>
    document.getElementById('provinsi').addEventListener('change', function() {
        fetch("<?= base_url('user/kota/') ?>" + this.value, {
                method: 'GET',
            })
            .then((response) => response.text())
            .then((data) => {
                document.getElementById('kota').innerHTML = data
            })
    });
</script> -->

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>


<script>
    var proQty = $('.input-jumlah');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var max = <?= $produk['stok'] ?>;
            if (oldValue >= max) {
                var newVal = parseFloat(oldValue) + 0;
            } else {
                var newVal = parseFloat(oldValue) + 1;
            }
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find('input').val(newVal);
    });
</script>

</body>

</html>