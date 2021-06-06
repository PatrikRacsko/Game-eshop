<template>
<div class="q-my-xl">
    <q-card>
        <q-card-title>Create new product</q-card-title>
        <q-card-main>
            <q-field :count="250">
                <q-input float-label="Name" max-length="250" />
            </q-field>
            <q-field :count="5000">
                <q-input
                    type="textarea"
                    float-label="Description"
                    :max-height="100"
                    rows="7"
                />
            </q-field>
            <q-field helper="Supported format: JPG, max. file size: 300KiB" class="q-mt-lg">
                <q-uploader float-label="Images" multiple extensions=".jpg" auto-expand/>
            </q-field>
        </q-card-main>
        <q-card-actions class="q-mt-md">
            <div class="row justify-end full-width docs-btn">
                <q-btn label="Cancel" flat to="/products/index"/>
                <q-btn label="Create" color="primary" />
            </div>
        </q-card-actions>
    </q-card>
</div>
</template>
 
<style lang="stylus">
.docs-btn .q-btn
    padding 15px 20px
</style>