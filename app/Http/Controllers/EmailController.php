<?php
namespace App\Http\Controllers;

use Dietercoopman\Mailspfchecker\Mailspfchecker;

class EmailController extends Controller
{
    private $mailSpfChecker;
    public function __construct(Mailspfchecker $mailSpfChecker)
    {
        $this->mailSpfChecker = $mailSpfChecker;
    }

    public function check() 
    {
        if ($this->mailSpfChecker->canISendAs("henry@henryleeworld.org")) {
            // the happy path
        } else {
            // you can not send e-mail in name of henry@henryleeworld.org, but I can tell you what to do  
            echo $this->mailSpfChecker->howCanISendAs("henry@henryleeworld.tw") . PHP_EOL;
            // Generate a txt-record with a name of dietse.dev and the value v=spf1 ip4:#.#.#.# -all
        }
    }
}
