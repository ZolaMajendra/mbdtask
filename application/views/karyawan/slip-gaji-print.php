<div class="row">

    <div class="span5">
      <div class="widget" id="ctn">
      <style type="text/css">
      a.title{
          font-size:19px; 
          color: black;
          font-family: "Times New Roman", Times, serif;
          display: block;
      }
      span.name_title{
          font-size:18px;
      }

      </style>
          <img src="<?php echo base_url()?>assets/img/logo/logo_login.png" style="max-width:200px">
          <p><br/></p>
          <a class="title">SLIP GAJI KARYAWAN</a>
          <span class="name_title" style="display:block;padding-bottom:2px;margin-bottom:1px;">Nama : <?php echo $salary_detail['profile_firstname'].' '.$salary_detail['profile_lastname']?></span>

          <div style="display: inline-block;width: 35%;">
              <span style="display:block;padding-bottom:3px;margin-bottom:3px;margin-top:10px; line-height:70%;">
                  <small><i style="display:inline-block;min-width:80px">Cabang</i></small>
                  : <?php echo $salary_detail['branch_name'] ?>
              </span>
              <span style="display:block;padding-bottom:3px;margin-bottom:3px;margin-top:10px; line-height:70%;">
                  <small><i style="display:inline-block;min-width:80px;">No. Rekening</i></small>
                  : <?php echo $salary_detail['bank_account'] ?>
              </span>
              <span style="display:block;padding-bottom:3px;margin-bottom:3px;margin-top:10px; line-height:70%;">
                  <small><i style="display:inline-block;min-width:80px;">Bank</i></small>
                  : <?php echo $salary_detail['bank_name'] ?>
              </span>
          </div>
          <div style="display: inline-block;width: 60%;">
              <span style="display:block;padding-bottom:3px;margin-bottom:3px;margin-top:10px; line-height:70%;">
                  <small><i style="display:inline-block;min-width:80px;">Periode</i></small>
                  : <?php echo date('25/m/y', strtotime('-1 month',strtotime($salary_detail['slip_month']))) .' - '. date('25/m/y', strtotime($salary_detail['slip_month'])) ?>
              </span>
              <span style="display:block;padding-bottom:3px;margin-bottom:3px;margin-top:10px; line-height:70%;">
                  <small><i style="display:inline-block;min-width:80px;">Jabatan</i></small>
                  : <?php echo $salary_detail['appointment_name'] ?>
              </span>
              <span style="display:block;padding-bottom:3px;margin-bottom:3px;margin-top:10px; line-height:70%;">
                  <small><i style="display:inline-block;min-width:80px;">Bidang Studi</i></small>
                  : <?php echo "GEOGRAFI" ?>
              </span>
          </div>

          <style type="text/css">
            table tr td{
              /*border: 1px solid black;*/
              font-size: 12px;
            }
            td.nominal{
              width: 110px; 
              border-right: 0.5px solid black; 
              padding-left: 10px;
            }
            td.kategori-pengurangan{
              width: 150px;
              padding-left: 10px;
            }
          </style>
          <table style="margin-top: 25px;">
            <tr>
              <td style="width: 180px;">Tunjangan</td>
              <td style="width: 105px; border-right: 0.5px solid black"></td>
              <td class="nominal">: Rp <?php echo '-'; ?></td>
              <td class="kategori-pengurangan"><b>Pengurangan 1<b></td>
              <td style="width: 100px;"></td>
            </tr>
            <tr>
              <td>Tunjangan</td>
              <td style="border-right: 0.5px solid black"></td>
              <td class="nominal">: Rp -</td>
              <td class="kategori-pengurangan">Sisa Pinjaman Bulan Lalu</td>
              <td> : Rp. -</td>
            </tr>
            <tr>
              <td style="border-bottom: 0.5px solid black">Tunjangan</td>
              <td style="border-bottom: 0.5px solid black; border-right: 0.5px solid black"></td>
              <td class="nominal">: Rp -</td>
              <td class="kategori-pengurangan">Cicilan</td>
              <td> : Rp -</td>
            </tr>
            <tr>
              <td> Nilai Kontrak Harian</td>
              <td style="border-right: 0.5px solid black"></td>
              <td class="nominal"> : Rp <?php echo number_format($salary_detail['nilai_kontrak'], 0, 0, '.'); ?></td>
              <td class="kategori-pengurangan"> Sisa Pinjaman </td>
              <td> : RP -</td>
            </tr>
            <tr>
              <td> Mengajar</td>
              <td style="border-right: 0.5px solid black"></td>
              <td class="nominal"> : Rp <?php echo number_format($salary_detail['mengajar'], 0, 0, '.') ?></td>
              <td class="kategori-pengurangan"></td>
              <td></td>
            </tr>
            <tr>
              <td> Mengajar Luar Kota</td>
              <td style="border-right: 0.5px solid black"></td>
              <td class="nominal"> : Rp <?php echo number_format($salary_detail['mengajar_luar'], 0, 0, '.') ?></td>
              <td class="kategori-pengurangan"> Tgl Pinjam </td>
              <td> - </td>
            </tr>
            <tr>
              <td> Promo Hari Minggu</td>
              <td style="border-right: 0.5px solid black"></td>
              <td class="nominal"> : Rp <?php echo number_format(0,0,0,'.') ?></td>
              <td class="kategori-pengurangan"></td>
              <td></td>
            </tr>
            <tr>
              <td> Piket</td>
              <td style="border-right: 0.5px solid black"></td>
              <td class="nominal"> : Rp <?php echo number_format($salary_detail['piket'], 0, 0, '.') ?></td>
              <td class="kategori-pengurangan"> <b>Pengurangan 2</b></td>
              <td></td>
            </tr>
            <tr>
              <td> Pembahasan Dalam Kota</td>
              <td style="border-right: 0.5px solid black"></td>
              <td class="nominal"> : Rp <?php echo number_format($salary_detail['pembahasan'], 0, 0, '.') ?></td>
              <td class="kategori-pengurangan"> Penalty </td>
              <td></td>
            </tr>
            <tr>
              <td> Pembahasan Luar Kota</td>
              <td style="border-right: 0.5px solid black"></td>
              <td class="nominal"> : Rp <?php echo number_format($salary_detail['pembahasan_luar'], 0, 0, '.') ?></td>
              <td class="kategori-pengurangan">Keterlambatan</td>
              <td>/90</td>
            </tr>
            <tr>
              <td> Kelebihan Jam Kerja</td>
              <td style="border-right: 0.5px solid black"></td>
              <td class="nominal"> : Rp <?php echo number_format($salary_detail['kelebihan_jam'], 0, 0, '.') ?></td>
              <td class="kategori-pengurangan"></td>
              <td></td>
            </tr>
          </table>
      </div>
    </div>

</div>
<script type="text/javascript">
    window.onload = function(){
      var printContents = document.getElementById('ctn').innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;
       
      window.print();
    }
</script>