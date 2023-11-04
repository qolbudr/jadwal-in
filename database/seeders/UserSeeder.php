<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ["Prof. Dr. Ekohariadi, M.Pd","196004041987011001","08155078973"],
            ["Anita Qoiriah, S.Kom  M.Kom","196901251995122001","0811342468"],
            ["Wiyli  Yustanti, S.Si. M.Kom","197702032005012001","08785440757"],
            ["Aditya Prapanca, ST. M.Kom","197411012003121001","08121691518"],
            ["Drs. Bambang Sujatmiko, M.T","196505191992021001","081234217032"],
            ["Dr. Yuni Yamasari, S.Kom., M.Kom","197506022003122001","08123072197"],
            ["I Kadek Dwi Nuryana, ST. M.Kom.","198104142009121004","081231509965"],
            ["Dwi Fatrianto Suyatno, S.Kom. M.Kom","197912202008121001","08563459445"],
            ["Naim Rochmawati, S.Kom. MT","197512032005012001","085851499818"],
            ["Aries Dwi Indriyanti, S.Kom.M.Kom","198004122006042002","081249354589"],
            ["Agus Prihanto, ST. M.Kom","197908062006041001","08563061761"],
            ["IGL. Putra Eka Prismana, S.Kom., M.Kom., MM","198003252008121001","08123035094"],
            ["Ardhini Warih Utami, S.Kom, M.Kom","198102212008122001","0818595272"],
            ["Yeni Anistyasari, S.Pd. M.Kom","198410272015042001","082232204466"],
            ["Rahadian Bisma, S.Kom., M.Kom","198702092015041003","081234546374"],
            ["I Made Suartana, S.Kom., M.Kom","198411242015041003","08563154182"],
            ["Dr. Ricky Eka Putra, S.Kom. M.Kom","198701162018031001","0818523490"],
            ["Rindu Puspita Wibawa, S.Kom., M.Kom","199309052019032017","081232721407"],
            ["Ghea Sekar Palupi, S.Kom., M.I.M","199303092019032021","085132453588"],
            ["Martini Dwi Endah Susanti, S.Kom., M.Kom,","199303162019032019","087868567006"],
            ["Paramitha Nerisafitra, S.ST., M.Kom","198905292019032013","081252719213"],
            ["Ronggo Alit S, Kom., M.M., MT","198412082020121002","081703380092"],
            ["Bonda Sisephaputra, M. Kom","198803102020121001","085648423543"],
            ["Ramadhan Cakra Wibawa, S.Pd., M.Kom","202111098","081333624976"],
            ["Harun Al Rosyid, S.T., M.T.","198408122010011000",""],
            ["Ervin Yohannes, S.Kom., M.Kom., M.Sc., Ph.D.","202309114",""],
            ["Sholikhun, ST","196510251987011006","085748933355"],
            ["Zainul Abidin","197506082009101003","081333078989"],
            ["Moch. Agung Adi Utomo, S.Sos","2201006136","081330599232"]
        ];

        DB::table('users')->truncate();

        foreach($datas as $data) {
            $user = new User();
            $user->name = $data[0];
            $user->nip = $data[1];
            $user->phone = $data[2];
            $user->password = Hash::make($data[1]);
            $user->save();
        }
    }
}
