
<div>
    <div style="display: flex; align-items:center; justify-content:between">
        <div>
            <h2  style="font-weight: bold; font-size:30px; font-style: text-transform:uppercase">Resep Obat</h2>
            <span style="color:rgb(174, 174, 174); font-weight:500">{{$user_id}}</span>
        </div>
        <div>
            <img src="https://static.wixstatic.com/media/777d37_b64b3efdadee43838c6c07a9a1d3cbe1~mv2.png/v1/fill/w_136,h_47,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/LOGO%20Dhealth%20FIX-05_edited.png" width="48px"/>
        </div>
    </div>

    <div >
        <div style="margin-top:20px;">
            <h3  style="font-size:20px;font-weight: 600">{{$receipe->name ?? 'No Racikan'}}</h3>
            <div  style="padding-left:8px; font-size:20px">
                <ol @if($receipe->type == 'Racikan') @endif>
                    @foreach($receipe->concoction as $key => $concotion)
                    <li>
                        <span  style="font-weight: 600">{{$concotion->obatalkes->obatalkes_kode}} </span> - {{$concotion->obatalkes->obatalkes_nama}}
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
        <div>
            <h3 style="font-weight:600; font-size:20px;">Pemakaian</h3>
            <div style="padding:10px 0; font-size:20px">
                <span style="font-weight: 600">{{$receipe->signa->signa_kode}} </span> - {{$receipe->signa->signa_nama}}
            </div>
        </div>
    </div>
</div>
