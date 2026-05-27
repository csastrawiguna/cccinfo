<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="flashmessage" style="display: none;"><?= $this->session->flashdata('message'); ?></div>

        <div class="container-fluid pt-3">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <span class="text-info">Daftar Kode RGB/Hexadecimal Warna</span>
                    <div class="card-tools">
                        <a href="<?= base_url('others/gado') ?>" class="mr-3"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <style type="text/css">
                .warna{
                    width: 240px;
                    height: 140px;
                    text-align: center;
                    vertical-align: middle;
                    color: white;
                    /*line-height: 62px;*/
                    padding-top: 32px;
                    font-size: 15px;
                    font-family: 'Tahoma', 'ITC Avant Garde Gothic', 'Century Gothic', sans-serif;
                    letter-spacing: 1px;
                    border: 2px solid white;
                    box-sizing: border-box;
                    display: inline-block;
                    position: relative;
                }
                #merah{background-color: rgb(210, 20, 65);}
                #orange{background-color: rgb(255, 87, 51);}
                #hijau{background-color: rgb(42, 184, 140);}
                #biru{background-color: rgb(20, 147, 165);}
                #ungu{background-color: rgb(88, 24, 69);}
                #navy{background-color: rgb(18, 45, 70);}

                /*.flatUI{margin-top: 50px;}*/

                .flat{
                    width: 360px;
                    height: 200px;
                    text-align: center;
                    color: black;
                    line-height: 80px;
                    font-size: 24px;
                    font-family: 'Tahoma', 'ITC Avant Garde Gothic', 'Century Gothic', sans-serif;
                    letter-spacing: 2px;
                    float: left;
                    display: table-cell;
                    vertical-align: middle;
                    border: 2px solid white;
                    box-sizing: border-box;
                    /*position: relative;*/
                }

                #turqoise{background-color: #1ACB9C;}
                #greenSea{background-color: #16A085;}
                #emerald{background-color: #2ECC71;}
                #nephritis{background-color: #27AE60;}
                #peterRiver{background-color: #3498DB;}
                #belizeHole{background-color: #2980B9;}
                #amethyst{background-color: #9B59B6;}
                #wisteria{background-color: #8E44AD;}
                #wetAsphalt{background-color: #34495E;}
                #midnightBlue{background-color: #2C3E50;}
                #sunFlower{background-color: #F1C40F;}
                #orange{background-color: #F39C12;}
                #carrot{background-color: #E67E22;}
                #pumpkin{background-color: #D35400;}
                #alizarin{background-color: #E74C3C;}
                #pomegranate{background-color: #C0392B;}
                #clouds{background-color: #ECF0F1;}
                #silver{background-color: #BDC3C7;}
                #concrete{background-color: #95A5A6;}
                #asbestos{background-color: #7F8C8D;}

                table{
                    margin-top: 30px;
                    display: block;
                }

                table td{
                    width: 210px;
                    min-width: 120px;
                    text-align: center;
                    font-family: tahoma;
                    font-size: 14px;
                    letter-spacing: 2px;
                    color: #222;
                }

                table tr{
                    height: 140px;
                    min-height: 100px;
                }

            </style>
            <div class="warna-favorit">
                <h3 id="JudulFavorit">Warna favorit</h3>
                <div id="merah" class="warna">Crimson<br>210, 20, 65<br>#D21441</div>
                <div id="orange" class="warna">Portland Orange<br>255, 87, 51<br>#FF5733</div>
                <div id="hijau" class="warna">Mountain Meadow Green<br>42, 184, 140<br>#2AB88C</div>
                <div id="biru" class="warna">Blue Green<br>22, 147, 165<br>#1693A5</div>
                <div id="ungu" class="warna">Brown Chocolate<br>88, 24, 69<br>#581845</div>
                <div id="navy" class="warna">Yankees Blue<br>18, 45, 70<br>#122D46</div>
            </div>
            <div class="adminlte3">
                <h5 class="mt-4 mb-1">AdminLTE 3</h5>
                <table class="mt-2">
                    <tr>
                        <td id="danger" style="background-color: #DC3545; color: white;">Danger<br>220, 53, 69<br>#DC3545</td>
                        <td id="warning" style="background-color: #FFC107">Warning<br>220, 193, 07<br>#FFC107</td>
                        <td id="success" style="background-color: #28A745; color: white;">Success<br>40, 167, 69<br>#28A745</td>
                        <td id="info" style="background-color: #17A2B8; color: white;">Info<br>23, 162, 184<br>#17A2B8</td>
                        <td id="primary" style="background-color: #007BFF; color: white;">Primary<br>0, 123, 255<br>#007BFF</td>
                    </tr>
                    <tr>
                        <td id="darkgrey" style="background-color: #343A40; color: white;">Gray Dark<br>52, 58, 64<br>#343A40</td>
                        <td id="secondary" style="background-color: #6C757D">Secondary<br>108, 117, 125<br>#6C757D</td>
                        <td id="gray" style="background-color: #ADB5BD;">Gray<br>173, 181, 189<br>#ADB5BD</td>
                        <td id="light" style="background-color: #F8F9FA;">Light<br>248, 249, 250<br>#F8F9FA</td>
                    </tr>
                    <tr>
                        <td id="maroon" style="background-color: #D81B60; color: white;">Maroon<br>216, 27, 96<br>#D81B60</td>
                        <td id="pink" style="background-color: #E83E8C; color: white;">Pink<br>232, 62, 140<br>#E83E8C</td>
                        <td id="fuchsia" style="background-color: #F012BE; color: white;">Fuchsia<br>240, 18, 190<br>#F012BE</td>
                        <td id="indigo" style="background-color: #6610F2; color: white;">Indigo<br>102, 16, 242<br>#6610F2</td>
                        <td id="purple" style="background-color: #605CA8; color: white;">Purple<br>96, 92, 168<br>#605CA8</td>
                    </tr>
                    <tr>
                        <td id="success" style="background-color: #001F3F; color: white;">Navy<br>0, 31, 63<br>#001F3F</td>
                        <td id="danger" style="background-color: #3C8DBC; color: white;">Lightblue<br>60, 141, 188<br>#3C8DBC</td>
                        <td id="info" style="background-color: #39CCCC;">Teal<br>57, 204, 204<br>#39CCCC</td>
                        <td id="success" style="background-color: #01FF70">Lime<br>1, 255, 112<br>#01FF70</td>
                        <td id="primary" style="background-color: #3D9970; color: white;">Olive<br>61, 153, 112<br>#3D9970</td>
                    </tr>
                </table>
            </div>
            <div class="flatUI">
                <h5 class="mt-4 mb-1">Flat UI Color</h5>
                <table class="mt-2">
                    <tr>
                        <td id="turqoise">Turqoise<br>26, 203, 156<br></td>
                        <td id="emerald">Emerald<br>46, 204, 113<br></td>
                        <td id="peterRiver" class="text-light">Peter River<br>52, 152, 219<br></td>
                        <td id="amethyst"class="text-light">Amethyst<br>155, 89, 182<br></td>
                        <td id="wetAsphalt" class="text-light">Wet Asphalt<br>52, 73, 94<br></td>
                    </tr>
                    <tr>
                        <td id="greenSea">Green Sea<br>22, 160, 133<br></td>
                        <td id="nephritis">Nephritis<br>39, 174, 96<br></td>
                        <td id="belizeHole" class="text-light">Belize Hole<br>41, 128, 185<br></td>
                        <td id="wisteria" class="text-light">Wisteria<br>142, 68, 173<br></td>
                        <td id="midnightBlue" class="text-light">Midnight Blue<br>44, 62, 80<br></td>
                    </tr>
                    <tr>
                        <td id="sunFlower">Sun Flower<br>241, 196, 15<br></td>
                        <td id="carrot">Carrot<br>230, 126, 34<br></td>
                        <td id="alizarin" class="text-light">Alizarin<br>231, 76, 60<br></td>
                        <td id="clouds">Clouds<br>236, 240, 241<br></td>
                        <td id="concrete">Concrete<br>149, 165, 166<br></td>
                    </tr>
                    <tr>
                        <td id="orange">Orange<br>243, 156, 18<br></td>
                        <td id="pumpkin">Pumpkin<br>211, 84, 0<br></td>
                        <td id="pomegranate" class="text-light">Pomegranate<br>192, 57, 43<br></td>
                        <td id="silver">Silver<br>189, 195, 199<br></td>
                        <td id="asbestos">Asbestos<br>127, 140, 141<br></td>
                    </tr>
                </table>
            </div>
        </div>                              
    </section>
</div>
