<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\KeyForgeRepository;

class keyForgeController extends Controller
{
    protected $keyForgeRepository;

    public function __construct(KeyForgeRepository $repository)
    {
        $this->keyForgeRepository = $repository;
    }

    public function index(Request $request)
    {
        $decks = $this->keyForgeRepository->getDecks();

        if ($request->deck) {
            $cards = $this->keyForgeRepository->getCardsByDeck($request->deck);

            $handCards = $cards->random(6);
        }

        return view('keyforge.index', compact('decks', 'handCards'));
    }
}
