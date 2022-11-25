<?php

namespace GodAPI;

use GodAPI\Shakti\Antaranga as AntarangaShakti;
use GodAPI\Shakti\Bahiranga as BahirangaShakti;
use GodAPI\Shakti\Tatastha as TatasthaShakti;

abstract class God extends Divinity
{
    // spirit | internal potency | Antaraṅgaśakti
    private AntarangaShakti $antarangaShakti;
    // matter | external potency | maya | Bahiraṅgaśakti
    private BahirangaShakti $bahirangaShakti;
    // jiva | marginal potency
    private TatasthaShakti $tatasthaShakti;

    public function __construct(
        AntarangaShakti $antarangaShakti,
        BahirangaShakti $bahirangaShakti,
        TatasthaShakti $tatasthaShakti
    ) {
        // $this->sat();
        // $this->cit();
        // $this->ananda();
    }

    protected function godhood()
    {
        return $this->antarangaShakti;
    }

    protected function maya()
    {
        return $this->bahirangaShakti;
    }

    protected function jiva()
    {
        return $this->tatasthaShakti;
    }
}
