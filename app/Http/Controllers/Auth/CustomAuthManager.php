<?php

namespace SBAnalysis\Http\Controllers\Auth;

use Illuminate\Support\Manager;
use Illuminate\Contracts\Auth\Guard as GuardContract;

class CustomAuthManager extends Manager
{
	/**
	 * Create a new driver instance.
	 *
	 * @param  string  $driver
	 * @return mixed
	 */
    protected function createDriver($driver)
    {
        $guard = parent::createDriver($driver);

        if (method_exists($guard, 'setCookieJar')) {
            $guard->setCookieJar($this->app['cookie']);
        }

        if (method_exists($guard, 'setDispatcher')) {
            $guard->setDispatcher($this->app['events']);
        }

        if (method_exists($guard, 'setRequest')) {
            $guard->setRequest($this->app->refresh('request', $guard, 'setRequest'));
        }

        return $guard;
    }

	/**
	 * Call a custom driver creator.
	 *
	 * @param  string  $driver
	 * @return \Illuminate\Contracts\Auth\Guard
	 */
	protected function callCustomCreator($driver)
	{
		$custom = parent::callCustomCreator($driver);
		if ($custom instanceof GuardContract) {
			return $custom;
		}

		return new CustomGuard($custom, $this->app['session.store']);
	}

	/**
	 * Create an instance of the database driver.
	 *
	 * @return \Illuminate\Auth\Guard
	 */
	public function createDatabaseDriver()
	{
		$provider = $this->createDatabaseProvider();

		return new CustomGuard($provider, $this->app['session.store']);
	}

	/**
	 * Create an instance of the database user provider.
	 *
	 * @return \Illuminate\Auth\DatabaseUserProvider
	 */
	protected function createDatabaseProvider()
	{
		$connection = $this->app['db']->connection();
		$table = $this->app['config']['auth.table'];

		return new CustomDatabaseUserProvider($connection, $this->app['hash'], $table);
	}

	/**
	 * Create an instance of the Eloquent driver.
	 *
	 * @return \Illuminate\Auth\Guard
	 */
	public function createEloquentDriver()
	{
		$provider = $this->createEloquentProvider();

		return new CustomGuard($provider, $this->app['session.store']);
	}

	/**
	 * Create an instance of the Eloquent user provider.
	 *
	 * @return \Illuminate\Auth\EloquentUserProvider
	 */
	protected function createEloquentProvider()
	{
		$model = $this->app['config']['auth.model'];

		return new CustomEloquentUserProvider($this->app['hash'], $model);
	}

	/**
	 * Get the default authentication driver name.
	 *
	 * @return string
	 */
	public function getDefaultDriver()
	{
		return $this->app['config']['auth.driver'];
	}

	/**
	 * Set the default authentication driver name.
	 *
	 * @param  string  $name
	 * @return void
	 */
	public function setDefaultDriver($name)
	{
		$this->app['config']['auth.driver'] = $name;
	}
}
