<?php

namespace Tests\Integration;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;
use App\Models\Breed;
use Tests\BaseTestCase;

class IntegrationTest extends BaseTestCase
{
    private function get(){
        return [
            "adaptability" => 5,
            "affection_level"=> 5,
            "alt_names"=> "",
            "cfa_url"=> "http://cfa.org/Breeds/BreedsAB/AmericanBobtail.aspx",
            "child_friendly"=> 4,
            "country_code"=> "US",
            "country_codes"=> "US",
            "description"=> "American Bobtails are loving and incredibly intelligent cats possessing a distinctive wild appearance. They are extremely interactive cats that bond with their human family with great devotion.",
            "dog_friendly"=> 5,
            "energy_level"=> 3,
            "experimental"=> 0,
            "grooming"=> 1,
            "hairless"=> 0,
            "health_issues"=> 1,
            "hypoallergenic"=> 0,
            "id"=> "abob",
            "indoor"=> 0,
            "intelligence"=> 5,
            "lap"=> 1,
            "life_span"=> "11 - 15",
            "name"=> "test",
            "natural"=> 0,
            "origin"=> "United States",
            "rare"=> 0,
            "reference_image_id"=> "hBXicehMA",
            "rex"=> 0,
            "shedding_level"=> 3,
            "short_legs"=> 0,
            "social_needs"=> 3,
            "stranger_friendly"=> 3,
            "suppressed_tail"=> 1,
            "temperament"=> "Intelligent, Interactive, Lively, Playful, Sensitive",
            "vcahospitals_url"=> "https://vcahospitals.com/know-your-pet/cat-breeds/american-bobtail",
            "vetstreet_url"=> "http://www.vetstreet.com/cats/american-bobtail",
            "vocalisation"=> 3,
            "weight_imperial" => "7 - 16",
            "weight_imperial" => "3 - 7",
            "wikipedia_url" =>  "https://en.wikipedia.org/wiki/American_Bobtail"
        ];
    }

    public function token(){

        $response = $this->runApp('POST', '/login', [
            'username' => 'admin',
            'password' => '@#$RF@!718'
        ]);

        $body = json_decode($response->getBody(), true);

        return $body['token'];
    }


    private function delete(){
        $breed = Breed::where('name','test')->first();
        if($breed instanceof Breed){
            $breed->delete();
        }

    }

    // testa se busca esta cacheada
    public function testCachedTrue()
    {
        $this->setToken($this->token());

        $breed = Breed::create($this->get());

        $response = $this->runApp('GET', "/breeds?name={$breed->name}");
        $body = json_decode($response->getBody(), true);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(true, $body['cached']);

        $breed = Breed::where('name','test')->first();

        $this->delete();

    }

    // busca pela api pois nao esta cacheado
    public function testCachedFalse(){
        $this->delete();
        $this->setToken($this->token());

        $response = $this->runApp('GET', "/breeds?name={$breed->name}");
        $body = json_decode($response->getBody(), true);
        $this->assertEquals(false, $body['cached']);

    }

}