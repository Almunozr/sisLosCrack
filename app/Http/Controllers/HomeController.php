<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Http\Controllers\EstudianteController;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view("home");
        // redirect(estudiantes.index);
    }
    public function create(){


        $host = "localhost";
        $nombre = "loscrack";
        $usuario = "root";
        $password = '';

        $fecha = date('Ymd_His');

        $nombre_sql = $nombre . '_'.$fecha.'.sql';

        $dump = "mysqldump -h$host -u$usuario -p$password $nombre > $nombre_sql";

        exec($dump);
        return view('/home');
    }
}
