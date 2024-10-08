<?php

namespace App\Service;

use App\Traits\ConsumeServicioExterno;
use stdClass;

class MarketService
{
    use ConsumeServicioExterno;

    const TOKEN_API = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiOWFiMDBiNWVlY2NlMzMwZWZiZTM1YjYxMWY5MjM0MjNlNzk5ODg4NTlkZTZhN2RmNWEwMWJjYmI5ZWExZTI4OWI0ZTk4N2I2NDU2N2RiNGEiLCJpYXQiOjE3MjgzOTAyOTcuNjgwMDI0LCJuYmYiOjE3MjgzOTAyOTcuNjgwMDI4LCJleHAiOjE3NTk5MjYyOTcuNjcwNTk0LCJzdWIiOiIxMjU3Iiwic2NvcGVzIjpbInB1cmNoYXNlLXByb2R1Y3QiLCJtYW5hZ2UtcHJvZHVjdHMiLCJtYW5hZ2UtYWNjb3VudCIsInJlYWQtZ2VuZXJhbCJdfQ.oqN4hYCqS74BXBbo4QxivfogJdBKhBNXNE2II6MjaXiQ_har8n-dLSgxRoiorPeTLV7wDN5UmY3BzdU7-ol-rr2M4cAKuXp-ubcd2dhkwQH4d_Yh2pD-UrKWIIc2LY4eP8Sf8rg1Ioa0fx8vSRKnzzNnmfe3nReFY_pi73dC5BmRz4z5rCkS6xPnvvqM1yBjRGLpFnXB0adFAPR5peMJ7xALHwbV29_otaA34-yGdwrYKb10bUIX1nCV7KDl9sN2I9VD22cYprzQLyuv5hVDTd49wHGf3xyN95dtkyTvRhCmHNR0On3dkT-tzzwKtR0ob8ZVw_cKbkIKhe1Lrz1X5wCNziT1BEMqssqxsdZ9mtrSW3tpULZR06krRuUkuc8AtaICC831r2-f57Wmybv-5gqDUfHjVYi0H_ncHiQaDYlrMGbRWZft1VhDAkk5oG-kYVEFGXTwqdqWNRiZiLoF6dnNcQ-hVUf-1pQvHV--hfK9IohBcar451S9tYzUq1W5y-5sk-oxaEDgEvomevF7TcbdOEO70hMJvQlgRqAOTrFu-DYR6cwCs9cvogVgQQDY3F4DlSQTK9cOXLsf9j18fvkNk_zjhM33Cchhl6fIvxRizJx0h_czKz5oGhG4viJ8MztPsp2aHDIp74qn6GhMs92aAoQ16Wzb1CWIyavZ26w';
    protected string $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.market.base_url');
    }

    /**
     * @param array $queryParams
     * @param array $formsParams
     * @param array $headers
     * @return void
     */
    private function resolveAuthorization(array &$queryParams = [], array &$formsParams = [], array &$headers = []):void
    {
        $accessToken =   $this->resolveAccessToken();

        $headers['Authorization'] = $accessToken;
    }

    /**
     * @param array $response
     * @return stdClass
     */
    private function decodeResponse(array $response): stdClass
    {
        //
    }

    /**
     * @param array $response
     * @return void
     */
    private function checkSiErrorResponse(array $response):void
    {
    }

    private function resolveAccessToken():string
    {
        return 'Bearer ' . self::TOKEN_API;
    }
}
