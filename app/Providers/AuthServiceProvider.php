<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\Gasto;
use App\Policies\CategoriaPolicy;
use App\Policies\GastoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Categoria::class => CategoriaPolicy::class,
        Gasto::class => GastoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
