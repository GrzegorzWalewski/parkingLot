<h1 style="display: flex; align-items: center;">
  <img src="https://github.com/GrzegorzWalewski/parkingLot/assets/25950627/912d769c-1653-41af-8af8-bb0b98d51567" alt="icon" style="width: 100px; height: 100px; margin-right: 10px;">
  Parking Lot
</h1>

## Prequeries
1. Create free [https://exchangeratesapi.io/](https://exchangeratesapi.io/) account and get API KEY.

## Run project
1. `git clone git@github.com:GrzegorzWalewski/parkingLot.git`
2. `cd parkingLot`
3. `docker-compose up -d --build`
4. Fill your access_key in .env file `EXCHANGE_RATE_API_KEY=`
5. Access project at [localhost:8000](http://localhost:8000)

## Available views
- Parking Areas
  ![obraz](https://github.com/GrzegorzWalewski/parkingLot/assets/25950627/26e7f36b-deb1-4fe6-be75-d2c46a96e664)

  - List of all parking areas
  - Delete/Edit buttons for each record
  - Form for adding new record
- Edit parking area   
    ![obraz](https://github.com/GrzegorzWalewski/parkingLot/assets/25950627/de24ada4-fe1e-4c56-8503-b72063dfb16c)
- Payment Calculator   
  ![obraz](https://github.com/GrzegorzWalewski/parkingLot/assets/25950627/f0d8ae05-b0b2-48f6-8732-f8c3156fe018)


## Tech stack
- PHP
- Laravel
- Livewire
- flatpickr
- tailwindCss
