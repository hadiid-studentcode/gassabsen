<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
    use HasFactory;

    protected $table = 'guests';

    protected $fillable = [
        'id',
        'nama',
        'pimpinan',
        'link',
        'qr_code',

    ];

    protected $primaryKey = 'id';

    public function GetGuests()
    {
        return Guests::all();

        // return Guests::where('id', '>=', 510)->where('id', '<=', 520)->get(); // 761
        // return Guests::whereNull('qr_code')->get();

    }

    public function GetGuestsNonQR()
    {
        // return Guests::all();
        return Guests::whereNull('qr_code')->get();

    }

    public function setGuests($data)
    {
        return Guests::create($data);
    }

    public function deleteGuests($id)
    {
        return Guests::find($id)->delete();
    }

    public function getGuestsById($id)
    {
        return Guests::find($id);
    }

    public function getGuestsByQrCode($qrCode)
    {
        return Guests::where('qr_code', $qrCode)->first();
    }

    public function updateGuests($data, $id)
    {
        return Guests::where('id', $id)->update($data);
    }

    public function jumlahGuests()
    {
        return Guests::count();
    }

    public function search($data)
    {
        return Guests::Where('nama_customer', 'ilike', '%'.$data.'%')->orwhere('kota', 'ilike', '%'.$data.'%')->get();

    }
}
