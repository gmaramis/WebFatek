@extends('master')

@section('title', 'Sejarah - Fakultas Teknik UNIMA')

@push('head')
<style>
    .sejarah-container {
      max-width: 800px;
      margin: 3rem auto;
      background: #fff;
      border-radius: 1.5rem;
      box-shadow: 0 4px 24px rgba(30,41,59,0.08), 0 1.5px 6px rgba(234,88,12,0.07);
      padding: 2.5rem 2rem;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .sejarah-title {
      text-align: center;
      font-size: 2.5rem;
      font-weight: 800;
      color: #ea580c;
      margin-bottom: 2rem;
      letter-spacing: 1px;
    }
    .sejarah-text {
      color: #222;
      font-size: 1.15rem;
      line-height: 1.8;
      text-align: justify;
    }
    .sejarah-text p {
      margin-bottom: 1.3em;
    }
    @media (max-width: 600px) {
      .sejarah-container {
        padding: 1.2rem 0.5rem;
        border-radius: 1rem;
      }
      .sejarah-title {
        font-size: 1.5rem;
      }
      .sejarah-text {
        font-size: 1rem;
      }
    }
</style>
@endpush

@section('content')
<main class="pt-24">
  <div class="sejarah-container">
    <div class="sejarah-title">Sejarah Fakultas Teknik</div>
    <div class="sejarah-text">
      <p>
        Fakultas Teknik (FATEK) adalah salah satu fakultas di Universitas Negeri Manado. FATEK berasal dari Perguruan Tinggi Pendidikan Guru (PTPG) Tondano, yang didirikan pada tanggal 22 September 1955 bersama 3 PTPG lainnya di Indonesia (Manado, Bandung dan Batusangkar). Sesudah itu pada tahun 1958 PTPG Tondano dialihkan menjadi FKIP UNHAS Makasar di Tondano. Tahun 1961 sesuai SK Menteri PTIP diintegrasikan menjadi FKIP Unsuluteng dan tahun 1963 dengan keluarnya surat keputusan Menteri PTIP No 55 Tahun 1963 tanggal 1 Mei 1963 FKIP UNSULUTENG Manado dialihkan menjadi IKIP Jokyakarta Cabang Manado yang terdiri dari lima fakultas diantaranya: FKT (Fakultas Keguruan Teknik) dengan tiga jurusan yaitu, Elektro, Bangunan dan Mesin. Kemudian dengan Keputusan Menteri PTIP No 38 hun 1965 tanggal 8 Maret 1965 Jo Keputusan Presiden RI No 275 tahun 1965 tanggal 14 September 1965, IKIP Manado ditetapkan sebagai IKIP berdiri sendiri dengan lima fakultas termasuk didalamnya FKT.  Dalam perkembangan selanjutnya berdasarkan surat Keputusan Menteri P dan K No. 042/0/1977 dimana FKT diganti dengan nama FKIT (Fakultas Keguruan Ilmu Teknik) IKIP Manado.   Pada tahun 1982, dengan SK Presiden No. 71 tahun 1982 tanggal 7 September 1982 dan Keputusan Menteri P dan K No, 0157/1983 nama FKIT IKIP manado dirubah menjadi FPTK ( Fakultas Pendidikan Teknologi dan Kejuruan) IKIP Negeri Manado dan Jurusan Elektro menjadi  Jurusan Pendidikan Teknik Elektro, demikian juga Jurusan Pendidikan Teknik Bangunan dan Jurusan Pendidikan Teknik Mesin.
      </p>
      <p>
        Pada tahun 1984  Jurusan Pendidikan Keluarga Sejahtera (PKS) dari Fakultas Ilmu Pendidikan di alihkan ke FPTK sesuai dengan surat keputusan Direktur Jenderal Pendidikan Tinggi Departemen Pendidikan dan Kebudayaan Republik Indonesia No. 60/DIKTI/Kep/1984 tentang jenis dan jumlah program studi di setiap jurusan pada fakultas di lingkungan IKIP Negeri Manado dengan nama jurusan Pendidikan Kesejahteraan Keluarga (PKK) dan mempunyai dua program studi yaitu Pendidikan Tata Boga dan Pendidikan Tata Boga dan Pendidikan Tata Busana.
      </p>
      <p>
        Di tahun 2000, berdasarkan Surat Keputusan Presiden RI Nomor: 127 tahun 2000 IKIP Negeri Manado dirubah menjadi Universitas Negeri Manado ( UNIMA) dengan sendirinya FPTK berubah menjadi Fakultas Teknik (FATEK) dengan empat jurusan yaitu: Pendidikan Teknik Elektro, Pendidikan Teknik Bangunan, Pendidikan Teknik Mesin dan Pendidikan Kesejahteraan Keluarga.
      </p>
      <p>
        Dua tugas utama UNIMA sebagaimana amanat KEPRES No. 127 tahun 2000 yaitu: (a) menyelenggarakan program pendidikan akademik dan atau pendidikan profesional dalam sejumlah disiplin ilmu pengetahuan, teknologi, dan atau kesenian tertentu; (b) mengembangkan ilmu pendidikan, ilmu keguruan, serta mendidik tenaga akademik dan profesional dalam bidang pendidikan.
      </p>
    </div>
  </div>
</main>
@endsection 