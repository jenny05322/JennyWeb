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
        }

        if (isset($cards)) {
            $handCards = $cards->random(6);
        } else {
            $handCards = null;
        }

        return view('keyforge.index', compact('decks', 'handCards'));
    }
}
