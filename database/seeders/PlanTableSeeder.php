<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::truncate();

        $plans = [
            [
                'name' => 'Solo',
                'slug' => 'solo',
                'description' => 'Perfect for individuals and freelancers getting started.',
                'logo' => 'https://via.placeholder.com/150/4F46E5/FFFFFF?text=Solo',
                'stripe_price_id' => 'price_1SiKKkEadK1gzfe0oWoabSRS',
                'stripe_product_id' => 'prod_Tffg8NsZgweIKc',
                'billing_period' => 'monthly',
                'monthly_credits' => 100,
                'price' => 5.99,
                'currency' => 'usd',
                'features' => [
                    'users' => 1,
                    'projects' => 3,
                    'support' => 'email',
                    'api_access' => false,
                    'team_features' => false,
                ],
                'is_active' => true,
                'hidden' => false,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Team',
                'slug' => 'team',
                'description' => 'Ideal for small teams that need collaboration features.',
                'logo' => 'https://via.placeholder.com/150/10B981/FFFFFF?text=Team',
                'stripe_price_id' => 'price_1Sih0rEadK1gzfe0BXIjkcAa',
                'stripe_product_id' => 'prod_Tg37gATcjYJBXs',
                'billing_period' => 'monthly',
                'monthly_credits' => 500,
                'price' => 19.99,
                'currency' => 'usd',
                'features' => [
                    'users' => 5,
                    'projects' => 20,
                    'support' => 'priority_email',
                    'api_access' => true,
                    'team_features' => true,
                ],
                'is_active' => true,
                'hidden' => false,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Unlimited',
                'slug' => 'unlimited',
                'description' => 'For growing businesses that need unlimited access.',
                'logo' => 'https://via.placeholder.com/150/F59E0B/FFFFFF?text=Pro',
                'stripe_price_id' => 'price_1Sih2pEadK1gzfe0bDzrv1WV',
                'stripe_product_id' => 'prod_Tg39ZQsS9kHbKZ',
                'billing_period' => 'monthly',
                'monthly_credits' => 5000,
                'price' => 39.99,
                'currency' => 'usd',
                'features' => [
                    'users' => 'unlimited',
                    'projects' => 'unlimited',
                    'support' => '24/7_priority',
                    'api_access' => true,
                    'team_features' => true,
                    'white_label' => true,
                ],
                'is_active' => true,
                'hidden' => false,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Yearly Plans (Save ~17%)
            [
                'name' => 'Solo (Yearly)',
                'slug' => 'solo-yearly',
                'description' => 'Perfect for individuals and freelancers getting started. Save with annual billing.',
                'logo' => 'https://via.placeholder.com/150/4F46E5/FFFFFF?text=Solo',
                'stripe_price_id' => 'price_1Sih3uEadK1gzfe0vKlwFIqz',
                'stripe_product_id' => 'prod_Tg3An3Cbo8NR9y',
                'billing_period' => 'yearly',
                'monthly_credits' => 100,
                'price' => 99.99,
                'currency' => 'usd',
                'features' => [
                    'users' => 1,
                    'projects' => 3,
                    'support' => 'email',
                    'api_access' => false,
                    'team_features' => false,
                ],
                'is_active' => true,
                'hidden' => false,
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Team (Yearly)',
                'slug' => 'team-yearly',
                'description' => 'Ideal for small teams that need collaboration features. Save with annual billing.',
                'logo' => 'https://via.placeholder.com/150/10B981/FFFFFF?text=Team',
                'stripe_price_id' => 'price_1Sih4nEadK1gzfe0M4imMV7n',
                'stripe_product_id' => 'prod_Tg3BFouWDeKHSo',
                'billing_period' => 'yearly',
                'monthly_credits' => 500,
                'price' => 199.99,
                'currency' => 'usd',
                'features' => [
                    'users' => 5,
                    'projects' => 20,
                    'support' => 'priority_email',
                    'api_access' => true,
                    'team_features' => true,
                ],
                'is_active' => true,
                'hidden' => false,
                'sort_order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Unlimited (Yearly)',
                'slug' => 'unlimited-yearly',
                'description' => 'For growing businesses that need unlimited access. Save with annual billing.',
                'logo' => 'https://via.placeholder.com/150/F59E0B/FFFFFF?text=Pro',
                'stripe_price_id' => 'price_1Sih5hEadK1gzfe02h54ZCFq',
                'stripe_product_id' => 'prod_Tg3CoM5ZU4PTnd',
                'billing_period' => 'yearly',
                'monthly_credits' => 5000,
                'price' => 299.99,
                'currency' => 'usd',
                'features' => [
                    'users' => 'unlimited',
                    'projects' => 'unlimited',
                    'support' => '24/7_priority',
                    'api_access' => true,
                    'team_features' => true,
                    'white_label' => true,
                ],
                'is_active' => true,
                'hidden' => false,
                'sort_order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
